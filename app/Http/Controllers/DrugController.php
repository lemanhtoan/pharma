<?php namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests\DrugRequest;
use App\Http\Requests\SearchRequest;
use App\Repositories\DrugRepository;
use App\Models\GroupDrug;
use App\Models\Drug_img;
use File,Input,DB;

class DrugController extends Controller {

	protected $drug_gestion;

	protected $nbrPages;

	public function __construct(
		DrugRepository $drug_gestion)
	{
		$this->drug_gestion = $drug_gestion;
		$this->nbrPages = 10;

		$this->middleware('redac', ['except' => ['indexFront', 'show', 'search']]);
		$this->middleware('ajax', ['only' => ['updateActive']]);
	}	

	public function indexFront()
	{
		$data = $this->drug_gestion->indexFront($this->nbrPages);
		$links = $data->render();

		return view('front.drug.index', compact('data', 'links'));
	}

	public function index()
	{
		return redirect(route('drug.order', [
			'name' => 'drugs.created_at',
			'sens' => 'desc'
		]));
	}

	public function indexOrder(Request $request)
	{
        $posts = $this->drug_gestion->index(
			10, 
			$request->name,
			$request->sens,
            $request->search,
            $request->s_group,
            $request->s_status
		);
		
		$links = $posts->appends([
				'name' => $request->name, 
				'sens' => $request->sens,
                'search' => $request->search,
                's_group' => $request->s_group,
                's_status' => $request->s_status
			]);
		$groupdrug = GroupDrug::all();

		if($request->ajax()) {
			return response()->json([
				'view' => view('back.drug.table', compact('statut', 'posts', 'groupdrug'))->render(),
				'links' => e($links->setPath('order')->render())
			]);		
		}

		$links->setPath('')->render();

		$order = (object)[
			'name' => $request->name, 
			'sens' => 'sort-' . $request->sens			
		];

		return view('back.drug.index', compact('posts', 'links', 'order', 'groupdrug'));
	}

	public function create()
	{
		$groupdrug = GroupDrug::all();
		$drugType = \Config::get('constants.drugType'); sort($drugType);
		$country = \Config::get('constants.country');
		return view('back.drug.create', compact('groupdrug', 'drugType', 'country'));
	}

	public function store(DrugRequest $request)
	{
        $post_id =$this->drug_gestion->store($request->all());
        if ($request->hasFile('txtdetail_img')) {
            $df = $request->file('txtdetail_img');
            foreach ($df as $row) {
                $img_detail = new Drug_img();
                if (isset($row)) {
                    $name_img= time().'_'.$row->getClientOriginalName();
                    $img_detail->url = $name_img;
                    $img_detail->drug_id = $post_id;
                    $row->move(\Config::get('constants.pathDrugImg'),$name_img);
                    $img_detail->save();
                }
            }
        }


        return redirect('drug')->with('ok', 'Cập nhật thành công');
	}

	public function show(
		Guard $auth, 
		$id)
	{
		return view('back.drug.show',  $this->drug_gestion->show($id));
	}


	public function edit(
		$id)
	{
		$post = $this->drug_gestion->getById($id);

		return view('back.drug.edit',  $this->drug_gestion->edit($post));
	}

	public function update(
        DrugRequest $request,
		$id)
	{
		$post = $this->drug_gestion->getById($id);

		$this->drug_gestion->update($request->all(), $post);

        if ($request->hasFile('txtdetail_img')) {
            $detail = Drug_img::where('drug_id',$id)->get();
            $df = $request->file('txtdetail_img');
            foreach ($detail as $row) {
                $dt = Drug_img::find($row->id);
                $pt = public_path(\Config::get('constants.pathDrugImg')).$dt->url;
                if (file_exists($pt))
                {
                    unlink($pt);
                }
                $dt->delete();
            }
            foreach ($df as $row) {
                $img_detail = new Drug_img();
                if (isset($row)) {
                    $name_img= time().'_'.$row->getClientOriginalName();
                    $img_detail->url = $name_img;
                    $img_detail->drug_id = $id;
                    $row->move(\Config::get('constants.pathDrugImg'),$name_img);
                    $img_detail->save();
                }
            }
        }

		return redirect('drug')->with('ok', trans('back/drug.updated'));		
	}

	public function postActdrug(
		Request $request, 
		$id)
	{
		$this->drug_gestion->updateActive($request->all(), $id);

		return response()->json();
	}

	public function destroy($id)
	{
		$post = $this->drug_gestion->getById($id);

		$this->drug_gestion->destroy($post);

		return redirect('drug')->with('ok', trans('back/drug.destroyed'));		
	}

	public function search(SearchRequest $request)
	{
		$search = $request->input('search');
        $sGroup = (int)$request->input('s_group') ? (int)$request->input('s_group') : '';
        $sStatus= $request->input('s_status');
        $posts = $this->drug_gestion->search($this->nbrPages, $search, $sGroup, $sStatus);
		$links = $posts->appends(compact('search'))->render();
        $order = (object)[
            'name' => 'drugs.created_at',
            'sens' => 'sort-' . 'desc'
        ];
        $groupdrug = GroupDrug::all();
		return view('back.drug.index', compact('posts', 'links', 'order', 'groupdrug'));
	}

}
