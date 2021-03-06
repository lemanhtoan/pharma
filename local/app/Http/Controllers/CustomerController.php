<?php namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\SearchRequest;
use App\Repositories\CustomerRepository;
use App\Models\Pharmacies;
use App\Models\UserLog;

use App\Helpers\ProcessText;
class CustomerController extends Controller {

	protected $customer_gestion;

	protected $nbrPages;

	public function __construct(
		CustomerRepository $customer_gestion)
	{
        if(ProcessText::checkUserAdmin()) { 
            $this->customer_gestion = $customer_gestion;
            $this->nbrPages = 10;
            $this->middleware('redac', ['except' => ['indexFront', 'show', 'search']]);
            $this->middleware('ajax', ['only' => ['updateActive']]);
        } else {
            return redirect('auth/login');
        }
	}	

	public function indexFront()
	{
		$data = $this->customer_gestion->indexFront($this->nbrPages);
		$links = $data->render();
		$pharmacies = Pharmacies::all();

		return view('front.customer.index', compact('data', 'links', 'pharmacies'));
	}

	public function index()
	{
		return redirect(route('customer.order', [
			'name' => 'customers.created_at',
			'sens' => 'desc'
		]));
	}

	public function indexOrder(Request $request)
	{

        if(ProcessText::checkUserAdmin()) {
            $posts = $this->customer_gestion->index(
                10,
                $request->name,
                $request->sens,
                $request->search,
                $request->s_status
            );

            $links = $posts->appends([
                'name' => $request->name,
                'sens' => $request->sens,
                'search' => $request->search,
                's_status' => $request->s_status
            ]);
            $pharmacies = Pharmacies::all();
             $dataLog = \DB::table('user_logs')->orderBy('id', 'desc')->get();

            if ($request->ajax()) {
                return response()->json([
                    'view' => view('back.customer.table', compact('statut', 'posts', 'pharmacies', 'dataLog'))->render(),
                    'links' => e($links->setPath('order')->render())
                ]);
            }

            $links->setPath('')->render();

            $order = (object)[
                'name' => $request->name,
                'sens' => 'sort-' . $request->sens
            ];

            
           
            //dd($pharmacies);
            return view('back.customer.index', compact('posts', 'links', 'order', 'pharmacies', 'dataLog'));
        } else {

        }
	}

	public function create()
	{
        $pharmacieId = Pharmacies::all();
		return view('back.customer.create', compact('pharmacieId'));
	}

	public function store(CustomerRequest $request)
	{
		$this->customer_gestion->store($request->all());

		return redirect('customer')->with('ok', 'Cập nhật thành công');
	}

	public function show(
		Guard $auth, 
		$id)
	{
		return view('back.customer.show',  $this->customer_gestion->show($id));
	}


	public function edit(
		$id)
	{
		$post = $this->customer_gestion->getById($id);

		return view('back.customer.edit',  $this->customer_gestion->edit($post));
	}

	public function update(
        Request $request,
		$id)
	{
		$phoneCheck  = $request->input('phone');

		$post = $this->customer_gestion->getById($id);

		$isCheck = Customer::where('phone', $phoneCheck)->first();
		if (count($isCheck)) {
			if ($isCheck->id != $id) {
				return redirect()->back()->with('message', 'Số điện thoại nhập đã có người sử dụng, vui lòng kiểm tra lại.');
			}

		}

		$this->customer_gestion->update($request->all(), $post);

		return redirect()->back()->with('success', 'Cập nhật thành công');
	}

	public function postActcustomer(
		Request $request, 
		$id)
	{
		$this->customer_gestion->updateActive($request->all(), $id);

		return response()->json();
	}

	public function destroy($id)
	{
		$post = $this->customer_gestion->getById($id);

		$this->customer_gestion->destroy($post);

		return redirect('customer')->with('ok', trans('back/customer.destroyed'));		
	}

	public function search(SearchRequest $request)
	{
		$search = $request->input('search');
        $sStatus= $request->input('s_status');
        $posts = $this->customer_gestion->search($this->nbrPages, $search, $sStatus);
		$links = $posts->appends(compact('search'))->render();
        $order = (object)[
            'name' => 'customers.created_at',
            'sens' => 'sort-' . 'desc'
        ];

		$pharmacies = Pharmacies::all();
        $dataLog = \DB::table('user_logs')->orderBy('id', 'desc')->get();

		return view('back.customer.index', compact('posts', 'links', 'order', 'pharmacies', 'dataLog'));
	}

}
