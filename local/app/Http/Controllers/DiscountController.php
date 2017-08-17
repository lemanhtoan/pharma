<?php namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests\DiscountRequest;
use App\Http\Requests\SearchRequest;
use App\Repositories\DiscountRepository;
use App\Models\Pharmacies;
use App\Models\UserLog;

class DiscountController extends Controller {

	protected $discount_gestion;

	protected $nbrPages;

	public function __construct(
		DiscountRepository $discount_gestion)
	{
		$this->discount_gestion = $discount_gestion;
		$this->nbrPages = 10;

		$this->middleware('redac', ['except' => ['indexFront', 'show', 'search']]);
	}

	public function indexFront()
	{
		$data = $this->discount_gestion->indexFront($this->nbrPages);
		$links = $data->render();

		return view('front.discount.index', compact('data', 'links'));
	}

	public function index()
	{
		return redirect(route('discount.order', [
			'name' => 'config_discount.created_at',
			'sens' => 'desc'
		]));
	}

	public function indexOrder(Request $request)
	{
        $posts = $this->discount_gestion->index(
			10, 
			$request->name,
			$request->sens,
            $request->search,
            $request->s_status
		);
		
		$links = $posts->appends([
				'name' => $request->name, 
				'sens' => $request->sens,
			]);

		if($request->ajax()) {
			return response()->json([
				'view' => view('back.discount.table', compact('statut', 'posts'))->render(),
				'links' => e($links->setPath('order')->render())
			]);		
		}

		$links->setPath('')->render();

		$order = (object)[
			'name' => $request->name, 
			'sens' => 'sort-' . $request->sens			
		];
		return view('back.discount.index', compact('posts', 'links', 'order'));
	}

	public function create()
	{
		return view('back.discount.create');
	}

	public function store(DiscountRequest $request)
	{
		$this->discount_gestion->store($request->all());

		return redirect('discount')->with('ok', 'Cập nhật thành công');
	}

	public function show(
		Guard $auth, 
		$id)
	{
		return view('back.discount.show',  $this->discount_gestion->show($id));
	}


	public function edit(
		$id)
	{
		$post = $this->discount_gestion->getById($id);

		return view('back.discount.edit',  $this->discount_gestion->edit($post));
	}

	public function update(
        DiscountRequest $request,
		$id)
	{
		$post = $this->discount_gestion->getById($id);

		$this->discount_gestion->update($request->all(), $post);

		return redirect('discount')->with('ok', trans('back/discount.updated'));		
	}

	public function destroy($id)
	{
		$post = $this->discount_gestion->getById($id);

		$this->discount_gestion->destroy($post);

		return redirect('discount')->with('ok', trans('back/discount.destroyed'));		
	}
}
