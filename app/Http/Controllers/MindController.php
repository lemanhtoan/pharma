<?php namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests\MindRequest;
use App\Http\Requests\SearchRequest;
use App\Repositories\MindRepository;
use App\Models\Drug;

use App\Models\Mind_Drug;

class MindController extends Controller {

	protected $mind_gestion;

	protected $nbrPages;

	public function __construct(
		MindRepository $mind_gestion)
	{
		$this->mind_gestion = $mind_gestion;
		$this->nbrPages = 10;

		$this->middleware('redac', ['except' => ['indexFront', 'show']]);
		$this->middleware('ajax', ['only' => ['updateActive']]);
	}	

	public function indexFront()
	{
		$data = $this->mind_gestion->indexFront($this->nbrPages);
		$links = $data->render();

		return view('front.mind.index', compact('data', 'links'));
	}

	public function index()
	{
		return redirect(route('mind.order', [
			'name' => 'minds.created_at',
			'sens' => 'desc'
		]));
	}

	public function indexOrder(Request $request)
	{
        $posts = $this->mind_gestion->index(
			10,
			$request->name,
			$request->sens
		);
		
		$links = $posts->appends([
				'name' => $request->name, 
				'sens' => $request->sens
			]);

		if($request->ajax()) {
			return response()->json([
				'view' => view('back.mind.table', compact('statut', 'posts'))->render(),
				'links' => e($links->setPath('order')->render())
			]);		
		}

		$links->setPath('')->render();

		$order = (object)[
			'name' => $request->name, 
			'sens' => 'sort-' . $request->sens			
		];

		return view('back.mind.index', compact('posts', 'links', 'order'));
	}

	public function create()
	{
		$drugs = Drug::orderBy('name', 'asc')->get();
		return view('back.mind.create', compact('drugs'));
	}

	public function store(MindRequest $request)
	{
        $post_id = $this->mind_gestion->store($request->all());

        if ($request->has('drug_id')) {
            $drugs = $request->all()['drug_id'];
            $prices = $request->all()['drugPrice'];
            $specialPrices = $request->all()['drugSpecialPrice'];
            $qtyMaxDiscount = $request->all()['drugQtyMaxDiscount'];
            $qtyMax = $request->all()['drugQtyMax'];
            $notes = $request->all()['drugNote'];
            $items = array();
            if ($drugs) {
                $i = 0;
                foreach ($drugs as $drug) {
                    $items[$i]['drug_id'] = $drug;
                    $i++;
                }
            }
            if ($prices) {
                $i = 0;
                foreach ($prices as $drug) {
                    $items[$i]['drug_price'] = $drug;
                    $i++;
                }
            }
            if ($specialPrices) {
                $i = 0;
                foreach ($specialPrices as $drug) {
                    $items[$i]['drug_special_price'] = $drug;
                    $i++;
                }
            }
            if ($qtyMaxDiscount) {
                $i = 0;
                foreach ($qtyMaxDiscount as $drug) {
                    $items[$i]['max_discount_qty'] = $drug;
                    $i++;
                }
            }
            if ($qtyMax) {
                $i = 0;
                foreach ($qtyMax as $drug) {
                    $items[$i]['max_qty'] = $drug;
                    $i++;
                }
            }
            if ($notes) {
                $i = 0;
                foreach ($notes as $drug) {
                    $items[$i]['note'] = $drug;
                    $i++;
                }
            }

            //echo "<pre>"; print_r($items);

            if ($items) {
                foreach ($items as $row) {
                    $mind_drug = new Mind_Drug();
                    if (isset($row)) {
                        $mind_drug->mind_id = $post_id;
                        $mind_drug->drug_id = $row['drug_id'];
                        $mind_drug->drug_price = $row['drug_price'];
                        $mind_drug->drug_special_price = $row['drug_special_price'];
                        $mind_drug->max_discount_qty = $row['max_discount_qty'];
                        $mind_drug->max_qty = $row['max_qty'];
                        $mind_drug->note = $row['note'];
                        $mind_drug->status = 1;
                        $mind_drug->save();
                    }
                }
            }
        }

		return redirect('mind')->with('ok', 'Cập nhật thành công');
	}

	public function show(
		Guard $auth, 
		$id)
	{
		return view('back.mind.show',  $this->mind_gestion->show($id));
	}


	public function edit(
		$id)
	{
		$post = $this->mind_gestion->getById($id);

		return view('back.mind.edit',  $this->mind_gestion->edit($post));
	}

	public function update(
        MindRequest $request,
		$id)
	{
	    //echo "<pre>"; var_dump($request->all()); die;
        $drugKeepIds = array();
        if ($request->has('drugKeepIds')) { $drugKeepIds = $request->all()['drugKeepIds'];}
        $post = $this->mind_gestion->getById($id);
		$this->mind_gestion->update($request->all(), $post);
        $getAllMindDrug = Mind_Drug::where('mind_id',$id)->get();

		// update mind_drugs
        $items = array();
        if ($request->has('drug_id') || (count($drugKeepIds) != count($getAllMindDrug)) ) {
            if ($request->has('drug_id')) {
                $drugs = $request->all()['drug_id'];
                $prices = $request->all()['drugPrice'];
                $specialPrices = $request->all()['drugSpecialPrice'];
                $qtyMaxDiscount = $request->all()['drugQtyMaxDiscount'];
                $qtyMax = $request->all()['drugQtyMax'];
                $notes = $request->all()['drugNote'];

                if ($drugs) {
                    $i = 0;
                    foreach ($drugs as $drug) {
                        $items[$i]['drug_id'] = $drug;
                        $i++;
                    }
                }
                if ($prices) {
                    $i = 0;
                    foreach ($prices as $drug) {
                        $items[$i]['drug_price'] = $drug;
                        $i++;
                    }
                }
                if ($specialPrices) {
                    $i = 0;
                    foreach ($specialPrices as $drug) {
                        $items[$i]['drug_special_price'] = $drug;
                        $i++;
                    }
                }
                if ($qtyMaxDiscount) {
                    $i = 0;
                    foreach ($qtyMaxDiscount as $drug) {
                        $items[$i]['max_discount_qty'] = $drug;
                        $i++;
                    }
                }
                if ($qtyMax) {
                    $i = 0;
                    foreach ($qtyMax as $drug) {
                        $items[$i]['max_qty'] = $drug;
                        $i++;
                    }
                }
                if ($notes) {
                    $i = 0;
                    foreach ($notes as $drug) {
                        $items[$i]['note'] = $drug;
                        $i++;
                    }
                }
            }


            $detail = Mind_Drug::where('mind_id',$id)->get();
            foreach ($detail as $row) {

                // not in keep id when edit => delete
                if (!in_array($row->id, $drugKeepIds)) {
                    $dt = Mind_Drug::find($row->id);
                    $dt->delete();
                }

            }
            // echo "<pre>"; print_r($items); die;

            if ($items) {
                foreach ($items as $row) {
                    $mind_drug = new Mind_Drug();
                    if (isset($row)) {
                        $mind_drug->mind_id = $id;
                        $mind_drug->drug_id = $row['drug_id'];
                        $mind_drug->drug_price = $row['drug_price'];
                        $mind_drug->drug_special_price = $row['drug_special_price'];
                        $mind_drug->max_discount_qty = $row['max_discount_qty'];
                        $mind_drug->max_qty = $row['max_qty'];
                        $mind_drug->note = $row['note'];
                        $mind_drug->status = 1;
                        $mind_drug->save();
                    }
                }
            }
        }

		return redirect('mind')->with('ok', trans('back/mind.updated'));
	}

	public function postActmind(
		Request $request, 
		$id)
	{
		$this->mind_gestion->updateActive($request->all(), $id);

		return response()->json();
	}

	public function destroy($id)
	{
		$post = $this->mind_gestion->getById($id);

		$this->mind_gestion->destroy($post);

		return redirect('mind')->with('ok', trans('back/mind.destroyed'));		
	}

}
