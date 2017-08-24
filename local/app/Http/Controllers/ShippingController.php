<?php namespace App\Http\Controllers;

use App\Models\Drug;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests\ShippingRequest;
use App\Http\Requests\SearchRequest;
use App\Repositories\ShippingRepository;

use App\Helpers\ProcessText;

class ShippingController extends Controller {

	protected $shipping_gestion;

	protected $nbrPages;

	public function __construct(
		ShippingRepository $shipping_gestion)
	{
        if(ProcessText::checkUserAdmin()) {
            $this->shipping_gestion = $shipping_gestion;
            $this->nbrPages = 10;

            $this->middleware('redac', ['except' => ['indexFront', 'show', 'search']]);
            $this->middleware('ajax', ['only' => ['updateActive']]);

        } else {
            return redirect('auth/login');
        }

	}	

	public function indexFront()
	{
		$data = $this->shipping_gestion->indexFront($this->nbrPages);
		$links = $data->render();

		return view('front.shipping.index', compact('data', 'links'));
	}

	public function index()
	{
		return redirect(route('shipping.order', [
			'name' => 'shipping_owner.created_at',
			'sens' => 'desc'
		]));
	}

	public function indexOrder(Request $request)
	{
        $posts = $this->shipping_gestion->index(
			10, 
			$request->name,
			$request->sens
		);
		$links = $posts->appends([
				'name' => $request->name, 
				'sens' => $request->sens
			]);

		$links->setPath('')->render();

		$order = (object)[
			'name' => $request->name, 
			'sens' => 'sort-' . $request->sens			
		];

		return view('back.shipping.index', compact('posts', 'links', 'order'));
	}

	public function create()
	{
		return view('back.shipping.create');
	}

	public function store(ShippingRequest $request)
	{
		$this->shipping_gestion->store($request->all());

		return redirect('shipping')->with('ok', 'Cập nhật thành công');
	}

	public function show(
		Guard $auth, 
		$id)
	{
		return view('back.shipping.show',  $this->shipping_gestion->show($id));
	}


	public function edit(
		$id)
	{
		$post = $this->shipping_gestion->getById($id);

		return view('back.shipping.edit',  $this->shipping_gestion->edit($post));
	}

	public function update(
        ShippingRequest $request,
		$id)
	{
		$post = $this->shipping_gestion->getById($id);

		$this->shipping_gestion->update($request->all(), $post);

		return redirect('shipping')->with('ok', trans('back/shipping.updated'));		
	}


	public function destroy($id)
	{
		$post = $this->shipping_gestion->getById($id);

		$this->shipping_gestion->destroy($post);

		return redirect('shipping')->with('ok', trans('back/shipping.destroyed'));		
	}
}
