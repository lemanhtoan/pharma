<?php namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Mind;
use App\Models\Pharmacies;
use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use App\Repositories\TransactionRepository;
use App\Models\Province;
use App\Models\District;
use App\Models\Transaction;
use App\Models\TransactionSend;

use PDF;
use Excel;

use App\Helpers\ProcessText;

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
        $transactionSend = TransactionSend::all();
		if($request->ajax()) {
			return response()->json([
				'view' => view('back.transactions.table', compact('statut', 'posts', 'transactionSend'))->render(),
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

//dd($transactionSend);
		return view('back.transactions.index', compact('posts', 'links', 'order', 'pharmacieType', 'province', 'district', 'minds', 'transactionSend'));
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
//	    dd($request->all());
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
        $s_mind_id = $request->input('s_mind_id') ? $request->input('s_mind_id') : '';
        $customerGroup = $request->input('s_customerGroup') ? $request->input('s_customerGroup') : '';
        $sStatus= $request->input('s_status');
        $sProvince = $request->input('s_province') ? $request->input('s_province') : '';
        $sDistrict = $request->input('s_district') ? $request->input('s_district') : '';

        $posts = $this->transactions_gestion->search($this->nbrPages, $search, $s_mind_id, $customerGroup, $sStatus, $sProvince, $sDistrict);
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
        $transactionSend = TransactionSend::all();

		return view('back.transactions.index', compact('posts', 'links', 'order', 'pharmacieType', 'province', 'district', 'minds', 'transactionSend'));
	}

	public function postTransactionSend(Request $request) {
	    // check exist or not
        $tranId = $request->input('transaction_id');
        $transactionCheck = TransactionSend::where('transaction_id', $tranId)->get();
        if (count($transactionCheck)) {
            TransactionSend::where('transaction_id', $tranId)
                ->update(['shipping_method' => $request->input('shipping_method'), 'code_send' =>  $request->input('code_send'),
                    'qty_box' => $request->input('qty_box'), 'date_send' =>  $request->input('date_send'), 'note' =>  $request->input('note')]);
        } else {
            $transactionSend = new TransactionSend();
            $transactionSend->transaction_id = $tranId;
            $transactionSend->shipping_method = $request->input('shipping_method');
            $transactionSend->code_send = $request->input('code_send');
            $transactionSend->qty_box = $request->input('qty_box');
            $transactionSend->date_send = $request->input('date_send');
            $transactionSend->note = $request->input('note');
            $transactionSend->save();

            // update status to Đang giao
            Transaction::where('id', $tranId)
                ->update(['status' => 'Đang giao']);
        }

        return response()->json();
    }

    public function in_hoa_don(Request $request) {

        $ids = $request->input('dataChoise');
        $arrIds = explode(",", $ids);
        $orders = Transaction::whereIn('id', $arrIds)->get();
        $title = 'Hóa đơn / Id #';
		
		htmlentities($orders, ENT_QUOTES, "UTF-8");
		
        $pdf = PDF::loadView('pdf.invoice', compact('title', 'orders'));
        $path = base_path() . '/pdf/invoice_'.date('d_m_Y').'.pdf';
        $pdf->save( $path );

        return $pdf->stream();
    }

    public function getTransctionDrugById($id) {
        $drug = Transaction::where('id', $id)->first();
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
                        $arrCode = explode("#", $row['ma_gd']);
                        if ( $this->getTransctionDrugById($arrCode[1]) != false ) {
                            $idTransction = $this->getTransctionDrugById($arrCode[1]);
                            $dataArray[] =
                                [
                                    // transaction update => get subtotal again calculator and update end_total
                                    'status' => $row['trang_thai'],
                                    'address' => $row['dia_chi_giao_hang'],
                                    'shipping_method' => $row['nha_van_chuyen'],
                                    'buyer_cost' => $row['tien_thu_ho_cod'],
                                    'note' => $row['ghi_chu'],

                                    'other_district' => $row['quan_huyen'],
                                    'other_province' => $row['tinh_tp'],

                                    'other_code_send' => $row['ma_van_don'],
                                    'other_box_qty' => $row['sl_thung'],
                                    'other_date_send' => $row['thoi_gian_giao_du_kien'],

                                    'id' => $idTransction
                                ];
                        } else {
                            $countError++;
                        }
                    }
                }
                //dd($dataArray);

                if(!empty($dataArray))
                {
                    if ($countError == 0) {
                        if (count($dataArray)) {
                            foreach ($dataArray as $item) {
                                $idTransaction = Transaction::where('id', '=', $item['id'])->first();
                                // update transaction
                                // calc again end_total
                                $phiMuaho = $item['buyer_cost']; // update it

                                $phiVanchuyen =  ProcessText::getConfig('dataVC');

                                $khuyenMai = ProcessText::getKhuyenMai($idTransaction->sub_total); //55000;

                                $end_total = ($idTransaction->sub_total + $phiMuaho + $phiVanchuyen) - $khuyenMai;

                                Transaction::where('id', $idTransaction->id)->update(
                                    array(
                                        'status' => $item['status'],
                                        'address' => $item['address'],
                                        'shipping_method' => $item['shipping_method'],
                                        'buyer_cost' => $item['buyer_cost'],
                                        'note' => $item['note'],
                                        'end_total' => $end_total
                                    )
                                );

                                // khong duoc update tinh huyen vi theo nha thuoc -> neu can thi phai bo sung rieng (k nen)

                                // update transaction_send

                                $datetimeSend = strtotime( $item['other_date_send'] );
                                TransactionSend::where('transaction_id', $idTransaction->id)->update(
                                    array(
                                        'code_send' => $item['other_code_send'],
                                        'qty_box' => $item['other_box_qty'],
                                        'date_send' =>  date( 'Y-m-d h:i:s', $datetimeSend ),
                                        'updated_at' => date("Y-m-d H:i:s")
                                    )
                                );
                            }
                            return redirect()->back()->with('success', 'Cập nhật dữ liệu từ file thành công');
                        }
                    }
                    else {
                        return redirect()->back()->with('message', 'Có lỗi xảy ra khi nhập file, vui lòng điều chỉnh dữ liệu');
                    }
                }
            }
        }
    }

    public function getMinData($id) {
        return Mind::where('id', $id)->first();
    }
    public function getCustomerData($id) {
        return Customer::where('id', $id)->first();
    }
    public function getPharmacieData($id) {
        return Pharmacies::where('id', $id)->first();
    }
    public function getSendTranData($id) {
        return TransactionSend::where('transaction_id', $id)->orderBy('id', 'desc')->first();
    }
    public function export(Request $request) {
        $items = Transaction::all();
        $newData = array();
        $arrItem = array();
        foreach ($items as $item) {
            $arrItem['Mã Phiên GD'] = '#'.$this->getMinData($item->mind_id)['code'];
            $arrItem['Mã GD'] = '#'.$item->id;
            $arrItem['Thời gian GD'] = date('d/m/Y h:i', strtotime($item->created_date));//$this->getGroupDrug($item->group_drug_id)['code'];
            $arrItem['Mã KH'] =  $this->getCustomerData($item->user_id)['code'];
            $arrItem['Tên KH'] = $this->getCustomerData($item->user_id)['name'];
            $arrItem['SL SP'] = $item->countQty;
            $arrItem['Tổng giá trị'] = (float)$item->end_total;
            $arrItem['Trạng thái'] = $item->status;
            $arrItem['Địa chỉ giao hàng'] = $item->address;

            // get id nha thuoc => dia chi huyen / tinh
            $dataIdpharmacie = $this->getCustomerData($item->user_id)['pharmacieId'];
            $arrItem['Quận / Huyện'] = $this->getPharmacieData($dataIdpharmacie)['district'];
            $arrItem['Tỉnh / TP'] =  $this->getPharmacieData($dataIdpharmacie)['province'];
            $arrItem['Nhà vận chuyển'] = $this->getSendTranData($item->id)['shipping_method'];
            $arrItem['Mã vận đơn'] = $this->getSendTranData($item->id)['code_send'];
            $arrItem['SL thùng'] = $this->getSendTranData($item->id)['qty_box'];
            $arrItem['Tiền thu hộ (COD)'] = (float)$item->buyer_cost;

            $datetime = new \DateTime( $this->getSendTranData($item->id)['date_send'] );
            $arrItem['Thời gian giao dự kiến'] = $datetime->format( 'd/m/Y h:i' );
            $arrItem['Ghi chú'] = $item->note;

            $newData[] = $arrItem;
        }

        Excel::create('Danh_Sach_Giao_Dich'.'_'.date('d-m-Y'), function($excel) use($newData) {
            // Set the title and Information fields
            $excel->sheet('Danh_Sach_Giao_Dich', function($sheet) use($newData) {
                $sheet->fromArray($newData, null, 'A3', false, true);
                // Set font family
                $sheet->setFontFamily('Calibri');

                $sheet->row(1, ['DANH SÁCH GIAO DỊCH']);

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


}
