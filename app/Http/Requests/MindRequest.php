<?php namespace App\Http\Requests;

use App\Models\Mind;

class MindRequest extends Request {

	public function rules()
	{
		return [
			'name' => 'required',
		];
	}

}