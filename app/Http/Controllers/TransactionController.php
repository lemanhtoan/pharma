<?php namespace App\Http\Controllers;

use App\Models\Mind;
use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use App\Repositories\TransactionRepository;
use App\Models\Province;
use App\Models\District;
use App\Models\Transaction;

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

		if($request->ajax()) {
			return response()->json([
				'view' => view('back.transactions.table', compact('statut', 'posts'))->render(),
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

		return view('back.transactions.index', compact('posts', 'links', 'order', 'pharmacieType', 'province', 'district', 'minds'));
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
        $sPharmacieType = $request->input('s_pharmacieType') ? $request->input('s_pharmacieType') : '';
        $sStatus= $request->input('s_status');
        $sProvince = $request->input('s_province') ? $request->input('s_province') : '';
        $sDistrict = $request->input('s_district') ? $request->input('s_district') : '';

        $posts = $this->transactions_gestion->search($this->nbrPages, $search, $sPharmacieType, $sStatus, $sProvince, $sDistrict);
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

		return view('back.transactions.index', compact('posts', 'links', 'order', 'pharmacieType', 'province', 'district', 'minds'));
	}

}
