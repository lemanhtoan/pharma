<?php namespace App\Http\Controllers;

use App\Models\Drug;
use App\Policies\PostPolicy;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests\DrugRequest;
use App\Http\Requests\SearchRequest;
use App\Repositories\DrugRepository;
use App\Models\GroupDrug;
use App\Models\Drug_img;
use File,Input,DB;

use Excel;

use App\Helpers\ProcessText;

class DrugController extends Controller {

	protected $drug_gestion;

	protected $nbrPages;

	public function __construct(
		DrugRepository $drug_gestion)
	{
        if(ProcessText::checkUserAdmin()) {
            $this->drug_gestion = $drug_gestion;
            $this->nbrPages = 10;

            $this->middleware('redac', ['except' => ['indexFront', 'show', 'search']]);
            $this->middleware('ajax', ['only' => ['updateActive']]);
        } else {
            return redirect('auth/login');
        }

	}

	public function getGroupDrug($id) {
        return GroupDrug::where('id', $id)->first();
    }

    public function imagesDrug($id) {
	    $dataget = Drug_img::where('drug_id', $id)->get();
	    $arr = array();
	    if (count($dataget)) {
	        foreach ($dataget as $img) {
	            $arr[] = $img->url;
            }
        }
        return implode(",", $arr);
    }
    public function getDrug($code) {
        $drug = Drug::where('code', $code)->first();
        if (count($drug)) {
            return $drug->id;
        }
        return false;
    }
    public function getGroupDrugByCode($code) {
        $drug = GroupDrug::where('code', $code)->first();
        if (count($drug)) {
            return $drug['id'];
        }
        return false;
    }
    public function import(Request $request) {
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
                        // check multi field required
                        if ( $this->getGroupDrugByCode($row['ma_nhom_thuoc']) != false ) { //&& $this->getGroupDrugByCode($row['ma_nhom_thuoc']) // $this->getDrug($row['ma_thuoc']) != false - k check ma (trong truong hop them moi)
                            $dataArray[] =
                                [
                                    'code' => $row['ma_thuoc'],
                                    'name' => $row['ten_thuoc'],
                                    'content' => $row['ham_luong'],
                                    'activeIngredient' => $row['hoat_chat_chinh'],
                                    'design' => $row['dang_bao_che'],
                                    'package' => $row['quy_cach_dong_goi'],
                                    'registerNumber' => $row['so_dang_ky'],
                                    'produceCompany' => $row['cong_ty_sx'],
                                    'produceCountry' => $row['nuoc_sx'],
                                    'registerCompany' => $row['cong_ty_dang_ky'],
                                    'registerCountry' => $row['nuoc_dang_ky'],
                                    'note' => $row['ghi_chu'],
                                    'status' => $row['trang_thai'] == 'Hoạt động' ? 1 : 0,
                                    'group_drug_id'=> $this->getGroupDrugByCode($row['ma_nhom_thuoc'])? $this->getGroupDrugByCode($row['ma_nhom_thuoc']) : '',
                                    'donvibuon' => $row['don_vi_buon']? $row['don_vi_buon']: '',
                                    'donvile' => $row['don_vi_le']? $row['don_vi_le'] : '',
                                    'hesoquydoi' =>$row['he_so_quy_doi'] ? $row['he_so_quy_doi'] : '',
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at' => date('Y-m-d H:i:s'),
                                    'media' => $row['link_anh_sp']
                                ];
                        } else {
                            $countError++;
                        }
                    }
                }

                if(!empty($dataArray))
                {
                    if ($countError == 0) {
                        if (count($dataArray)) {
                            foreach ($dataArray as $item) {
                                $isDb = Drug::where('code', '=', $item['code'])->first();
                                $mediaBefore = explode(",", $item['media']);
                                unset($item['media']);
                                if ($isDb === null) {
                                    // create
                                    $drugId = Drug::insertGetId($item);
                                    if (count($mediaBefore)) {
                                        foreach ($mediaBefore as $img) {
                                            if (isset($img) && $img != '') {
                                                $img_detail = new Drug_img();
                                                $img_detail->url = $img;
                                                $img_detail->drug_id = $drugId;
                                                $img_detail->save();
                                            }
                                        }
                                    }
                                } else {
                                    // update
                                    Drug::where('id', $isDb->id)->update($item);

                                    // remove all img before
                                    $dt = Drug_img::find($isDb->id);
                                    if($dt) {
                                        $pt = public_path(\Config::get('constants.pathDrugImg')) . $dt->url;
                                        if (file_exists($pt)) {
                                            unlink($pt);
                                        }
                                        $dt->delete();
                                    }

                                    // create new image
                                    if (count($mediaBefore)) {
                                        foreach ($mediaBefore as $img) {
                                            if (isset($img) && $img != '') {
                                                $img_detail = new Drug_img();
                                                $img_detail->url = $img;
                                                $img_detail->drug_id = $isDb->id;
                                                $img_detail->save();
                                            }
                                        }
                                    }
                                }
                            }
                            return redirect()->back()->with('success', 'Nhập dữ liệu từ file thành công');
                        }
                    }
                    else {
                            return redirect()->back()->with('message', 'Có lỗi xảy ra khi nhập file, vui lòng cập nhật lại danh sách thuốc');
                    }
                }
            }
        }
    }

    public function export(Request $request) {
        $items = Drug::orderBy('name', 'asc')->get();
        $newData = array();
        $arrItem = array();
        foreach ($items as $item) {
            $arrItem['Mã thuốc'] = $item->code;
            $arrItem['Tên thuốc'] = $item->name;
            // Mã nhóm thuốc
            $arrItem['Mã nhóm thuốc'] = $this->getGroupDrug($item->group_drug_id)['code'];
            // Tên nhóm thuốc
            $arrItem['Tên nhóm thuốc'] = $this->getGroupDrug($item->group_drug_id)['short_name'];
            // Hoạt chất chính
            $arrItem['Hoạt chất chính'] = $item->activeIngredient;
            // Hàm lượng
            $arrItem['Hàm lượng'] = $item->content;
            // Dạng bào chế
            $arrItem['Dạng bào chế'] = $item->design;
            // Quy cách đóng gói
            $arrItem['Quy cách đóng gói'] = $item->package;
            // Đơn vị buôn
            $arrItem['Đơn vị buôn'] = $item->donvibuon;
            // Đơn vị lẻ
            $arrItem['Đơn vị lẻ'] = $item->donvile;
            // Hệ số quy đổi
            $arrItem['Hệ số quy đổi'] = $item->hesoquydoi;
            // Số đăng ký
            $arrItem['Số đăng ký'] = $item->registerNumber;
            // Công ty SX
            $arrItem['Công ty SX'] = $item->produceCompany;
            // Nước SX
            $arrItem['Nước SX'] = $item->produceCountry;
            // Công ty đăng ký
            $arrItem['Công ty đăng ký'] = $item->registerCompany;
            // Nước đăng ký
            $arrItem['Nước đăng ký'] = $item->registerCountry;
            // Ghi chú
            $arrItem['Ghi chú'] = $item->note;
            // Trạng thái
            $arrItem['Trạng thái'] = $item->status == '1' ? 'Hoạt động' : 'Tạm dừng';
            // Link ảnh SP
            $arrItem['Link ảnh SP'] = $this->imagesDrug($item->id);
            $newData[] = $arrItem;
        }

        Excel::create('Danh_sach_thuoc'.'_'.date('d-m-Y)'), function($excel) use($newData) {
            // Set the title and Information fields
            $excel->sheet('Danh_Sach_Thuoc', function($sheet) use($newData) {
                $sheet->fromArray($newData, null, 'A3', false, true);
                // Set font family
                $sheet->setFontFamily('Calibri');

                $sheet->row(1, ['DANH SÁCH THUỐC']);

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
                        'size'       => '11',
                        'bold'       =>  false,
                    ));
                    $cell->setFontColor('#ffffff');
                    $cell->setBackground('#001F5F');
                });

                $sheet->getStyle('A1')->getAlignment()->setWrapText(false);
            });
        })->export('xlsx');
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
