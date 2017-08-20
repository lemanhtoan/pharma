<?php
namespace App\Helpers;
use App\Models\Discount;

class ProcessText {

	static function getConfig($slug) {
		$value = '';
		$query = \DB::table('settings')->where('name', $slug)->select('content')->first();
		if (count($query)){
			$value = $query->content;
		}
		return $value;
	}
	static function getKhuyenMai($total) {
		$discountValue = 0;
		$unit = 1000000;
		$lv1  = Discount::where('level', '1')->first();
		if (count($lv1)) {
			if ($total < $lv1->from * $unit) {
				$discountValue = 55000;
			} elseif ($total >= $lv1->to * $unit) {
				$discountValue += (($lv1->to * $unit) * ($lv1->percent)) / 100;
			} elseif($total ==  $lv1->from * $unit) {
				$discountValue += (($lv1->to * $unit) * ($lv1->percent)) / 100;
			} else {
				$discountValue += ((($total - ($lv1->from * $unit)) * ($lv1->percent)) / 100);
			}
		} else {
			$discountValue = 55000;
		}

		$lv2 = Discount::where('level', '2')->first();
		if (count($lv2)) {
			if ($total >= $lv2->to * $unit) {
				$discountValue += ((($lv2->to * $unit) - ($lv1->to * $unit)) * ($lv2->percent)) / 100;
			}elseif($total > ($lv2->from * $unit)) {
				$discountValue += ((($total - ($lv2->from * $unit)) * ($lv2->percent)) / 100);
			}
		}

		$lv3 = Discount::where('level', '3')->first();
		if (count($lv3)) {
			if ($total >= $lv3->to * $unit) {
				$discountValue += ((($lv3->to * $unit) - ($lv2->to * $unit)) * ($lv3->percent)) / 100;
			}elseif($total >($lv3->from * $unit)) {
				$discountValue += ((($total - ($lv3->from * $unit)) * ($lv3->percent)) / 100);
			}
		}

		$lv4 = Discount::where('level', '4')->first();
		if (count($lv4)) {
			if ($total >= $lv4->to * $unit) {
				$discountValue += ((($lv4->to * $unit) - ($lv3->to * $unit)) * ($lv4->percent)) / 100;
			}elseif($total > ($lv4->from * $unit)) {
				$discountValue += ((($total - ($lv4->from * $unit)) * ($lv4->percent)) / 100);
			}
		}

		$lv5 = Discount::where('level', '5')->first();
		if (count($lv5)) {
			if ($total >= $lv5->to * $unit) {
				$discountValue += ((($lv5->to * $unit) - ($lv4 > to * $unit)) * ($lv5->percent)) / 100;
			}elseif($total > ($lv5->from * $unit)) {
				$discountValue += ((($total - ($lv5->from * $unit)) * ($lv5->percent)) / 100);
			}
		}

		$lv6 = Discount::where('level', '6')->first();
		if (count($lv6)) {
			if ($total >= $lv6->to * $unit) {
				$discountValue += ((($lv6->to * $unit) - ($lv5 > to * $unit)) * ($lv6->percent)) / 100;
			}elseif($total > ($lv6->from * $unit)) {
				$discountValue += ((($total - ($lv6>from * $unit)) * ($lv6->percent)) / 100);
			}
		}

		$lv7 = Discount::where('level', '7')->first();
		if (count($lv7)) {
			if ($total >= $lv7->to * $unit) {
				$discountValue += ((($lv7->to * $unit) - ($lv6 > to * $unit)) * ($lv7->percent)) / 100;
			}elseif($total > ($lv7->from * $unit)) {
				$discountValue += ((($total - ($lv7->from * $unit)) * ($lv7->percent)) / 100);
			}
		}

		$lv8 = Discount::where('level', '8')->first();
		if (count($lv8)) {
			if ($total >= $lv8->to * $unit) {
				$discountValue += ((($lv8->to * $unit) - ($lv7 > to * $unit)) * ($lv8->percent)) / 100;
			}elseif($total > ($lv8->from * $unit)) {
				$discountValue += ((($total - ($lv8->from * $unit)) * ($lv8->percent)) / 100);
			}
		}

		$lv9 = Discount::where('level', '9')->first();
		if (count($lv9)) {
			if ($total >= $lv9->to * $unit) {
				$discountValue += ((($lv9->to * $unit) - ($lv8 > to * $unit)) * ($lv9->percent)) / 100;
			}elseif($total > ($lv9->from * $unit)) {
				$discountValue += ((($total - ($lv9->from * $unit)) * ($lv9->percent)) / 100);
			}
		}

		$lv10 = Discount::where('level', '10')->first();
		if (count($lv10)) {
			if($total >= $lv10->to * $unit) {
				$discountValue += ( ( ($lv10->to * $unit) - ($lv9>to * $unit) )* ($lv10->percent)) / 100;
			}elseif($total > ($lv10->from * $unit)) {
				$discountValue += ((($total - ($lv10->from * $unit)) * ($lv10->percent)) / 100);
			}
		}

		return $discountValue;
	}


	function stripUnicode($str){
		if(!$str)	return false;
		$unicode = array(
			'a'  =>	'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
			'A'	 =>	'Á|À|Ả|Ã|Ạ|Ă|Á|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
			'd'  =>	'đ',
			'D'	 =>	'Đ',
			'e'  =>	'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
			'E'	 =>	'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
			'i'  =>	'í,ì,ỉ,ĩ,ị',
			'I'	 =>	'Í|Ì|Ỉ|Ĩ|Ị',
			'o'  =>	'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
			'O'	 =>	'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
			'u'	 =>	'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
			'U'	 =>	'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
			'y'	 =>	'ý|ỳ|ỷ|ỹ|ỵ',
			'Y'	 =>	'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
		);
		foreach($unicode as $khongdau => $codau){
			$arr = explode('|',$codau);
			$str = str_replace($arr,$khongdau,$str);
		}
		return $str;
	}
	function changeTitle($str){
		if(empty($str)){
			return;
		}
		$str = trim($str);
		if($str == "")	return "";
		$str = str_replace('"','',$str);
		$str = str_replace("'","",$str);
		$str = str_replace("/","-",$str);
		$str = stripUnicode($str);
		$str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
		//MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
		$str = str_replace(' ','-',$str);
		return $str;

	}
	function stranslateTime($str){
		if(empty($str)){
			return;
		}
		$unicode = array(
			'giây'=>'seconds|second',
			'phút'=>'minutes|minute',
			'giờ'=>'hours|hour',
			'ngày'=>'days|day',
			'tuần'=>"weeks|week",
			'tháng'=>'months|month',
			'năm'=>'years|year',
			'trước'=>'ago'
		);
		foreach($unicode as $key => $value){
			$arr = explode('|',$value);
			$str = str_replace($arr,$key,$str);
		}
		return $str;
	}


	function _substr($str, $length, $minword = 3){
		if(empty($str)){
			return;
		}
		$sub = '';
		$len = 0;
		foreach (explode(' ', $str) as $word)
		{
			$part = (($sub != '') ? ' ' : '') . $word;
			$sub .= $part;
			$len += strlen($part);
			if (strlen($word) > $minword && strlen($sub) >= $length)
			{
				break;
			}
		}
		return $sub . (($len < strlen($str)) ? '...' : '');
	}
	//biến $tiem có định dạng ngày là: yyyy-mm-dd
	function getTimeForList($time){
		if(empty($time))
			return;
		$date_arr = explode('-',$time);

		//dùng cho việc xem danh sách
		$result = $date_arr[2].'/'.$date_arr[1].'/'.$date_arr[0];
		return $result;
	}
	//dùng cho việc cập nhật
	function getTimeForUpdate($time){
		if(empty($time))
			return;
		$date_arr = explode('-',$time);
		//dùng cho việc xem danh sách
		$result = $date_arr[1].'/'.$date_arr[2].'/'.$date_arr[0];
		return $result;
	}



	function tranalateDateToAddDB($date){
		if(!$date){
			return '0000-00-00';
		}
		$date_arr = explode('/',$date);
		$date_str = $date_arr[2].'-'.$date_arr[0].'-'.$date_arr[1];
		return $date_str;
	}


	function randDomCode($length){
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$size = strlen( $chars );
		$str = "";
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}
		return $str;
	}

	function getStatusAccount($status){
		if($status == 0){
			return 'Đang hoạt động';
		}
		return 'Tài khoản bị khóa';
	}

	function displayDataIfEmpty($data){
		return !empty($data)?$data:"Chưa cập nhật";
	}

	function getTableName($index){
		$list_table = ["none","classes","lessions","results","school_fees","student_added_teachers","student_classes","study_address","study_levels","subjects","teachers","works","users"];
		return $list_table[$index];
	}
}
