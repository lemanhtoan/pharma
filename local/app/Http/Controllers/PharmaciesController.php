<?php namespace App\Http\Controllers;

//use Illuminate\Contracts\Auth\Guard;
use App\Models\Pharmacies;
use Illuminate\Http\Request;
use App\Http\Requests\PharmaciesRequest;
use App\Http\Requests\SearchRequest;
use App\Repositories\PharmaciesRepository;
use App\Models\Province;
use App\Models\District;

use App\Helpers\ProcessText;

class PharmaciesController extends Controller {

	protected $pharmacies_gestion;

	protected $nbrPages;

	public function __construct(
		PharmaciesRepository $pharmacies_gestion)
	{
        if(ProcessText::checkUserAdmin()) {

            $this->pharmacies_gestion = $pharmacies_gestion;
            $this->nbrPages = 10;

            $this->middleware('redac', ['except' => ['indexFront', 'show', 'search']]);
            $this->middleware('ajax', ['only' => ['updateActive', 'postChangeProvince']]);

        } else {
            return redirect('auth/login');
        }

	}

	public function postPharStatus(Request $request){
	    $ids =$request->input('dataChoise');
	    $arrId = explode(",", $ids);
        $this->pharmacies_gestion->updateActiveChecked($arrId);
        return response()->json();
    }

	public function indexFront()
	{
		$data = $this->pharmacies_gestion->indexFront($this->nbrPages);
		$links = $data->render();

		return view('front.pharmacies.index', compact('data', 'links'));
	}

	public function index()
	{
		return redirect(route('pharmacies.order', [
			'name' => 'pharmacies.created_at',
			'sens' => 'desc'
		]));
	}

	public function indexOrder(Request $request)
	{
        $posts = $this->pharmacies_gestion->index(
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
				'view' => view('back.pharmacies.table', compact('statut', 'posts'))->render(),
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
		return view('back.pharmacies.index', compact('posts', 'links', 'order', 'pharmacieType', 'province', 'district'));
	}

	public function create()
	{
        $province = Province::all();
        $district = [];//District::all();
        $pharmacieType = \Config::get('constants.pharmacieType');
		return view('back.pharmacies.create', compact('province', 'district', 'pharmacieType'));
	}

	public function store(Request $request)
	{
		$codeCheck  = $request->input('code');
        $phoneCheck = $request->input('phone');
		$isCheck = Pharmacies::where('code', $codeCheck)->orWhere('phone', $phoneCheck)->first();

		if (count($isCheck)) {
			$post = $request->all();
			return redirect()->back()->with('post', $post)->with('message', 'Khách hàng đã tồn tại, vui lòng kiểm tra lại.');

		}


		$this->pharmacies_gestion->store($request->all());

		return redirect('pharmacies')->with('success', 'Cập nhật thành công');
	}

	public function show(
//		Guard $auth,
		$id)
	{
		return view('back.pharmacies.show',  $this->pharmacies_gestion->show($id));
	}


	public function edit(
		$id)
	{
		$post = $this->pharmacies_gestion->getById($id);

		return view('back.pharmacies.edit',  $this->pharmacies_gestion->edit($post));
	}

	public function update(
        Request $request,
		$id)
	{
		$codeCheck  = $request->input('code');
        $phoneCheck = $request->input('phone');

		$post = $this->pharmacies_gestion->getById($id);

		$isCheck = Pharmacies::where('code', $codeCheck)->orWhere('phone', $phoneCheck)->first();
		if (count($isCheck)) {
			if ($isCheck->id != $id) {
				return redirect()->back()->with('message', 'Khách hàng đã tồn tại, vui lòng kiểm tra lại.');
			}

		}



		$this->pharmacies_gestion->update($request->all(), $post);

		return redirect()->back()->with('success', 'Cập nhật thành công');
	}

	public function postActpharmacies(
		Request $request, 
		$id)
	{
		$this->pharmacies_gestion->updateActive($request->all(), $id);

		return response()->json();
	}

	public function postChangeProvince(Request $request) {
	    $provinceId = $request->input('province');
	    $districtData = District::where('provinceId', $provinceId)->orderBy('name', 'asc')->get();
        return response()->json($districtData);
    }

	public function destroy($id)
	{
		$post = $this->pharmacies_gestion->getById($id);

		$this->pharmacies_gestion->destroy($post);

		return redirect('pharmacies')->with('ok', trans('back/pharmacies.destroyed'));		
	}

	public function search(SearchRequest $request)
	{
		$search = $request->input('search');
        $sPharmacieType = $request->input('s_pharmacieType') ? $request->input('s_pharmacieType') : '';
        $sStatus= $request->input('s_status');
        $sProvince = $request->input('s_province') ? $request->input('s_province') : '';
        $sDistrict = $request->input('s_district') ? $request->input('s_district') : '';

        $posts = $this->pharmacies_gestion->search($this->nbrPages, $search, $sPharmacieType, $sStatus, $sProvince, $sDistrict);
		$links = $posts->appends(compact('search'))->render();
        $order = (object)[
            'name' => 'pharmacies.created_at',
            'sens' => 'sort-' . 'desc'
        ];

        $pharmacieType = \Config::get('constants.pharmacieType');
        $province = Province::all();
        $district = [];
        if ($sProvince!="") {
            $provinceData = Province::where('name', $sProvince)->get(['id']);
            $district = District::where('provinceId', $provinceData[0]->id)->orderBy('name', 'asc')->get();
        }
		return view('back.pharmacies.index', compact('posts', 'links', 'order', 'pharmacieType', 'province', 'district'));
	}

}
