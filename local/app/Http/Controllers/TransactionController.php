<?php namespace App\Http\Controllers;

use App\Models\Mind;
use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use App\Repositories\TransactionRepository;
use App\Models\Province;
use App\Models\District;
use App\Models\Transaction;
use App\Models\TransactionSend;

use PDF;

class TransactionController extends Controller {

	protected $transactions_gestion;

	protected $nbrPages;

	public function __construct(
		TransactionRepository $transactions_gestion)
	{
		$this->transactions_gestion = $transactions_gestion;
		$this->nbrPages = 10;

		$this->middleware('redac', ['except' => ['indexFront', 'show', 'search']]);
		$this->middleware('ajax', ['only' => ['updateActive', 'postChangeProvince']]);
	}	

	public function indexFront()
	{
		$data = $this->transactions_gestion->indexFront($this->nbrPages);
		$links = $data->render();

		return view('front.transactions.index', compact('data', 'links'));
	}

	public function index()
	{
		return redirect(route('transactions.order', [
			'name' => 'transactions.created_at',
			'sens' => 'desc'
		]));
	}

	public function indexOrder(Request $request)
	{

        $posts = $this->transactions_gestion->index(
			10, 
			$request->name,
			$request->sens,
            $request->search,
            $request->s_pharmacieType,
            $request->s_status,
            $request->s_province,
            $request->s_district
		);

		$links = $posts->appends([
				'name' => $request->name, 
				'sens' => $request->sens,
                'search' => $request->search,
                's_pharmacieType' => $request->s_pharmacieType,
                's_status' => $request->s_status,
                's_province' => $request->s_province,
                's_district' => $request->s_district
			]);
        $transactionSend = TransactionSend::all();
		if($request->ajax()) {
			return response()->json([
				'view' => view('back.transactions.table', compact('statut', 'posts', 'transactionSend'))->render(),
				'links' => e($links->setPath('order')->render())
			]);		
		}
		$links->setPath('')->render();

		$order = (object)[
			'name' => $request->name, 
			'sens' => 'sort-' . $request->sens			
		];

		$pharmacieType = \Config::get('constants.pharmacieType');
		$province = Province::all();
        $district = [];

		$minds = Mind::orderBy('name', 'asc')->get();

//dd($transactionSend);
		return view('back.transactions.index', compact('posts', 'links', 'order', 'pharmacieType', 'province', 'district', 'minds', 'transactionSend'));
	}

	public function create()
	{
        $province = Province::all();
        $district = [];//District::all();
        $pharmacieType = \Config::get('constants.pharmacieType');
		return view('back.transactions.create', compact('province', 'district', 'pharmacieType'));
	}

	public function store(Request $request)
	{
		$this->transactions_gestion->store($request->all());

		return redirect('transactions')->with('ok', 'Cập nhật thành công');
	}

	public function show(
//		Guard $auth,
		$id)
	{
		return view('back.transactions.show',  $this->transactions_gestion->show($id));
	}


	public function edit(
		$id)
	{
		$post = $this->transactions_gestion->getById($id);

		return view('back.transactions.edit',  $this->transactions_gestion->edit($post));
	}

	public function update(
        Request $request,
		$id)
	{
//	    dd($request->all());
		$post = $this->transactions_gestion->getById($id);

		$this->transactions_gestion->update($request->all(), $post);

		return redirect('transactions')->with('ok', trans('back/transactions.updated'));		
	}

	public function postActtransactions(
		Request $request)
	{
		$this->transactions_gestion->updateActive($request->all());

		return response()->json();
	}

	public function postChangeProvince(Request $request) {
	    $provinceId = $request->input('province');
	    $districtData = District::where('provinceId', $provinceId)->orderBy('name', 'asc')->get();
        return response()->json($districtData);
    }

	public function destroy($id)
	{
		$post = $this->transactions_gestion->getById($id);

		$this->transactions_gestion->destroy($post);

		return redirect('transactions')->with('ok', trans('back/transactions.destroyed'));		
	}

	public function search(SearchRequest $request)
	{
		$search = $request->input('search');
        $s_mind_id = $request->input('s_mind_id') ? $request->input('s_mind_id') : '';
        $customerGroup = $request->input('s_customerGroup') ? $request->input('s_customerGroup') : '';
        $sStatus= $request->input('s_status');
        $sProvince = $request->input('s_province') ? $request->input('s_province') : '';
        $sDistrict = $request->input('s_district') ? $request->input('s_district') : '';

        $posts = $this->transactions_gestion->search($this->nbrPages, $search, $s_mind_id, $customerGroup, $sStatus, $sProvince, $sDistrict);
		$links = $posts->appends(compact('search'))->render();
        $order = (object)[
            'name' => 'transactions.created_at',
            'sens' => 'sort-' . 'desc'
        ];

        $pharmacieType = \Config::get('constants.pharmacieType');
        $province = Province::all();
        $district = [];
        if ($sProvince!="") {
            $provinceData = Province::where('name', $sProvince)->get(['id']);
            $district = District::where('provinceId', $provinceData[0]->id)->orderBy('name', 'asc')->get();
        }

		$minds = Mind::orderBy('name', 'asc')->get();
        $transactionSend = TransactionSend::all();

		return view('back.transactions.index', compact('posts', 'links', 'order', 'pharmacieType', 'province', 'district', 'minds', 'transactionSend'));
	}

	public function postTransactionSend(Request $request) {
	    // check exist or not
        $tranId = $request->input('transaction_id');
        $transactionCheck = TransactionSend::where('transaction_id', $tranId)->get();
        if (count($transactionCheck)) {
            TransactionSend::where('transaction_id', $tranId)
                ->update(['shipping_method' => $request->input('shipping_method'), 'code_send' =>  $request->input('code_send'),
                    'qty_box' => $request->input('qty_box'), 'date_send' =>  $request->input('date_send'), 'note' =>  $request->input('note')]);
        } else {
            $transactionSend = new TransactionSend();
            $transactionSend->transaction_id = $tranId;
            $transactionSend->shipping_method = $request->input('shipping_method');
            $transactionSend->code_send = $request->input('code_send');
            $transactionSend->qty_box = $request->input('qty_box');
            $transactionSend->date_send = $request->input('date_send');
            $transactionSend->note = $request->input('note');
            $transactionSend->save();

            // update status to Đang giao
            Transaction::where('id', $tranId)
                ->update(['status' => 'Đang giao']);
        }

        return response()->json();
    }

    public function in_hoa_don(Request $request) {

        $ids = $request->input('dataChoise');
        $arrIds = explode(",", $ids);
        $orders = Transaction::whereIn('id', $arrIds)->get();
        $title = 'Invoice order #';
		
		htmlentities($orders, ENT_QUOTES, "UTF-8");
		
        $pdf = PDF::loadView('pdf.invoice', compact('title', 'orders'));
        $path = base_path() . '/pdf/invoice_'.date('d_m_Y').'.pdf';
        $pdf->save( $path );

        return $pdf->stream();
    }

}
