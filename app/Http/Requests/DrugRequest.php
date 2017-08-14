<?php namespace App\Http\Requests;

use App\Models\Drug;

class DrugRequest extends Request {

	public function rules()
	{
		return [
			'code' => 'required',
			'name' => 'required',
			'package' => 'required',
			'donvibuon' => 'required',
			'donvile' => 'required',
			'hesoquydoi' => 'required',
			'produceCompany' => 'required'
		];
	}

}