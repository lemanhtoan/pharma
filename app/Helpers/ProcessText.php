<?php
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