<?php namespace App\Http\Controllers;

use App\Models\Mind;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests\MindRequest;
use App\Http\Requests\SearchRequest;
use App\Repositories\MindRepository;
use App\Models\Drug;

use App\Models\Mind_Drug;


use App\Helpers\ProcessText;

use Excel;

class MindController extends Controller {

    public function export(Request $request) {
        $mindId = $request->input('mindId');
        $items = Mind_Drug::where('mind_id', $mindId)->get();
        $newData = array();
        $arrItem = array();
        foreach ($items as $item) {
            $arrItem['Mã thuốc'] = $this->getDrugById($item->drug_id)['code'];
            $arrItem['Tên thuốc'] = $this->getDrugById($item->drug_id)['name'];
            $arrItem['Giá gốc'] = (float)$item->drug_price;
            $arrItem['Giá KM'] = (float)$item->drug_special_price;
            $arrItem['SL KM tối đa'] = (int)$item->max_discount_qty;
            $arrItem['SL tối đa trong phiên'] = (int)$item->max_qty;
            $arrItem['Ghi chú'] = $item->note;
            $newData[] = $arrItem;
        }

        Excel::create('Danh_sach_thuoc_trong_phien_#'.$mindId.'_'.date('d-m-Y'), function($excel) use($newData) {
            // Set the title and Information fields
            $excel->sheet('Danh_sach_thuoc_trong_phien', function($sheet) use($newData) {
                $sheet->fromArray($newData, null, 'A3', false, true);

                $sheet->setFontFamily('Calibri');
                $sheet->row(1, ['DANH SÁCH THUỐC TRONG PHIÊN']);

                $sheet->setHeight(1, 50);
                $sheet->cell('A1', function($cell) {
                    $cell->setAlignment('center');
                    $cell->setFont(array(
                        'size'       => '11',
                        'bold'       =>  true
                    ));
                });
                // set height
                $sheet->setHeight(3, 25);

                $sheet->row(3, function($cell) {
                    $cell->setFont(array(
                        'size'       => '12',
                        'bold'       =>  false,
                    ));
                    $cell->setFontColor('#ffffff');
                    $cell->setBackground('#001F5F');
                });

                $sheet->getStyle('A1')->getAlignment()->setWrapText(false);
            });
        })->export('xlsx');
    }
    
	protected $mind_gestion;

	protected $nbrPages;

	public function __construct(
		MindRepository $mind_gestion)
	{
        if(ProcessText::checkUserAdmin()) {

            $this->mind_gestion = $mind_gestion;
            $this->nbrPages = 10;

            $this->middleware('redac', ['except' => ['indexFront', 'show']]);
            $this->middleware('ajax', ['only' => ['updateActive']]);
            
        } else {
            return redirect('auth/login');
        }

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

    public function getDrug($code) {
        $drug = Drug::where('code', $code)->first();
        if (count($drug)) {
            if($drug->id != '0') {
                return $drug->id;
            } else {
                return false;
            }
        }
        return false;
    }

    public function getDrugById($id) {
        $drug = Drug::where('id', $id)->first();
        if (count($drug)) {
            return $drug;
        }
        return false;
    }

	public function store(MindRequest $request)
	{
        $post_id = $this->mind_gestion->store($request->all());

        if($request->file('imported-file'))
        {

            $path = $request->file('imported-file')->getRealPath();
            $data = Excel::load($path, function($reader)
            {
                config(['excel.import.startRow' => 3]);
            })->get();
            //dd($data);

            $countError = 0;

            if(!empty($data) && $data->count())
            {
                foreach ($data->toArray() as $row)
                {
                    if(!empty($row))
                    {
                        if ($this->getDrug($row['ma_thuoc']) != false && $this->checkRootPrice($row['gia_goc'])) {

                            $dataArray[] =
                                [
                                    'mind_id' => $post_id,
                                    'drug_id' => $this->getDrug($row['ma_thuoc']),
                                    'drug_price' => (float)$row['gia_goc'],
                                    'drug_special_price' => (float)$row['gia_km'],
                                    'max_discount_qty' => (int)$row['sl_km_toi_da'],
                                    'max_qty' => (int)$row['sl_toi_da_trong_phien'],
                                    'note' => $row['ghi_chu'] ? (string)$row['ghi_chu'] : '',
                                    'status' => 1
                                ];
                        } else {
                            $countError++;
                        }
                    }
                }
                if(!empty($dataArray))
                {
                    if ($countError == 0) {

                        // delete old product
                        Mind_Drug::where('mind_id', $post_id)->delete();

                        $dataArrayImport = $this->unique_multidim_array($dataArray,'drug_id');

                        Mind_Drug::insert($dataArrayImport);

//                        return redirect()->back()->with('success', 'Nhập dữ liệu từ file thành công');
                    } else {
                        return redirect("mind/$post_id")->with('errors', 'Có lỗi xảy ra khi nhập file, vui lòng cập nhật lại danh sách thuốc');
                    }

                }
            }
        }
        //die;

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
                        $mind_drug->note = $row['note'] ? (string)$row['note'] : '';
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

	public function checkRootPrice($price) {
	    if ($price=="" || $price=="0") {
	        return false;
        }
        if ($price < 0) {
	        return false;
        }
        return true;
    }

    public function unique_multidim_array($array, $key) { 
        $temp_array = array(); 
        $i = 0; 
        $key_array = array(); 
        
        foreach($array as $val) { 
            if (!in_array($val[$key], $key_array)) { 
                $key_array[$i] = $val[$key]; 
                $temp_array[$i] = $val; 
            } 
            $i++; 
        } 
        return $temp_array; 
    } 

	public function update(
        MindRequest $request,
		$id)
	{

        $drugKeepIds = array();
        if ($request->has('drugKeepIds')) { $drugKeepIds = $request->all()['drugKeepIds'];}
        $post = $this->mind_gestion->getById($id);
        $this->mind_gestion->update($request->all(), $post);
        $getAllMindDrug = Mind_Drug::where('mind_id',$id)->get();


        if($request->file('imported-file'))
        {

            $path = $request->file('imported-file')->getRealPath();
            $data = Excel::load($path, function($reader)
            {
                config(['excel.import.startRow' => 3]);
            })->get();

            $countError = 0;

            if(!empty($data) && $data->count())
            {
                foreach ($data->toArray() as $row)
                {
                    if(!empty($row))
                    {
                        if ($this->getDrug($row['ma_thuoc']) != false && $this->checkRootPrice($row['gia_goc'])) {
                            $dataArray[] =
                                [
                                    'mind_id' => $id,
                                    'drug_id' => $this->getDrug($row['ma_thuoc']),
                                    'drug_price' => (float)$row['gia_goc'],
                                    'drug_special_price' => (float)$row['gia_km'],
                                    'max_discount_qty' => (int)$row['sl_km_toi_da'],
                                    'max_qty' => (int)$row['sl_toi_da_trong_phien'],
                                    'note' => $row['ghi_chu'] ? (string)$row['ghi_chu'] : '',
                                    'status' => 1
                                ];
                        } else {
                            $countError++;
                        }
                    }
                }
                if(!empty($dataArray))
                {
                    if ($countError == 0) {

                        // delete old product
                        Mind_Drug::where('mind_id', $id)->delete();

                        $dataArrayImport = $this->unique_multidim_array($dataArray,'drug_id');

                        Mind_Drug::insert($dataArrayImport);

                        return redirect()->back()->with('success', 'Nhập dữ liệu từ file thành công');
                    } else {
                        return redirect()->back()->with('errors', 'Có lỗi xảy ra khi nhập file, vui lòng kiểm tra lại');
                    }

                }
            }
        } else {
            // update mind_drugs
            //var_dump(count($drugKeepIds), count($getAllMindDrug));
            //echo "<pre>";var_dump($request->all()); die;
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
                    //echo "<pre>"; var_dump(!in_array($row->id, $drugKeepIds), $row->id); echo "<hr>";

                    // not in keep id when edit => delete
                    if (!in_array($row->id, $drugKeepIds)) {
                        $dt = Mind_Drug::find($row->id);
                        $dt->delete();
                    } else {
                        // update when have change it
                        Mind_Drug::where('id', $row->id)
                            ->update(['drug_id' => $row->drug_id]);
                    }

                }

                if ($items) {
                    foreach ($items as $row) {
                        $mind_drug = new Mind_Drug();
                        if (isset($row)) {
                            $mind_drug->mind_id = $id;
                            $mind_drug->drug_id = $row['drug_id'];
                            $mind_drug->drug_price = $row['drug_price'] ? $row['drug_price'] : 0;
                            $mind_drug->drug_special_price = $row['drug_special_price'] ? $row['drug_special_price']: 0;
                            $mind_drug->max_discount_qty = $row['max_discount_qty'] ? $row['max_discount_qty'] : 0;
                            $mind_drug->max_qty = $row['max_qty'] ? $row['max_qty'] : 0;
                            $mind_drug->note = $row['note'] ? $row['note'] : '';
                            $mind_drug->status = 1;
                            $mind_drug->save();
                        }
                    }
                }
            }
        }
	    //echo "<pre>"; var_dump($request->all()); die;



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
