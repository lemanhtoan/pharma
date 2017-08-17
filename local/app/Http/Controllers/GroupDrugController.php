<?php namespace App\Http\Controllers;

use App\Models\Drug;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests\GroupDrugRequest;
use App\Http\Requests\SearchRequest;
use App\Repositories\GroupDrugRepository;

class GroupDrugController extends Controller {

	protected $group_drug_gestion;

	protected $nbrPages;

	public function __construct(
		GroupDrugRepository $group_drug_gestion)
	{
		$this->group_drug_gestion = $group_drug_gestion;
		$this->nbrPages = 10;

		$this->middleware('redac', ['except' => ['indexFront', 'show', 'search']]);
		$this->middleware('ajax', ['only' => ['updateActive']]);
	}	

	public function indexFront()
	{
		$data = $this->group_drug_gestion->indexFront($this->nbrPages);
		$links = $data->render();

		return view('front.groupdrug.index', compact('data', 'links'));
	}

	public function index()
	{
		return redirect(route('groupdrug.order', [
			'name' => 'group_drugs.created_at',
			'sens' => 'desc'
		]));
	}

	public function indexOrder(Request $request)
	{
        $posts = $this->group_drug_gestion->index(
			10, 
			$request->name,
			$request->sens,
            $request->search
		);
		
		$links = $posts->appends([
				'name' => $request->name, 
				'sens' => $request->sens,
                'search' => $request->search
			]);

		if($request->ajax()) {
			return response()->json([
				'view' => view('back.groupdrug.table', compact('statut', 'posts'))->render(),
				'links' => e($links->setPath('order')->render())
			]);		
		}

		$links->setPath('')->render();

		$order = (object)[
			'name' => $request->name, 
			'sens' => 'sort-' . $request->sens			
		];

		$drugs = Drug::all();

		return view('back.groupdrug.index', compact('posts', 'links', 'order', 'drugs'));
	}

	public function create()
	{
		return view('back.groupdrug.create');
	}

	public function store(GroupDrugRequest $request)
	{
		$this->group_drug_gestion->store($request->all());

		return redirect('groupdrug')->with('ok', 'Cập nhật thành công');
	}

	public function show(
		Guard $auth, 
		$id)
	{
		return view('back.groupdrug.show',  $this->group_drug_gestion->show($id));
	}


	public function edit(
		$id)
	{
		$post = $this->group_drug_gestion->getById($id);

		return view('back.groupdrug.edit',  $this->group_drug_gestion->edit($post));
	}

	public function update(
        GroupDrugRequest $request,
		$id)
	{
		$post = $this->group_drug_gestion->getById($id);

		$this->group_drug_gestion->update($request->all(), $post);

		return redirect('groupdrug')->with('ok', trans('back/groupdrug.updated'));		
	}

	public function postActgroupdrug(
		Request $request, 
		$id)
	{
		$this->group_drug_gestion->updateActive($request->all(), $id);

		return response()->json();
	}

	public function destroy($id)
	{
		$post = $this->group_drug_gestion->getById($id);

		$this->group_drug_gestion->destroy($post);

		return redirect('groupdrug')->with('ok', trans('back/groupdrug.destroyed'));		
	}

	public function search(SearchRequest $request)
	{
		$search = $request->input('search');
        $posts = $this->group_drug_gestion->search($this->nbrPages, $search);
		$links = $posts->appends(compact('search'))->render();
        $order = (object)[
            'name' => 'group_drugs.created_at',
            'sens' => 'sort-' . 'desc'
        ];
		$drugs = Drug::all();
		return view('back.groupdrug.index', compact('posts', 'links', 'order', 'drugs'));
	}

}
