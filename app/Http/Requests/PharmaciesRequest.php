<?php namespace App\Http\Requests;

use App\Models\Pharmacies;

class PharmaciesRequest extends Request {

	public function rules()
	{
		return [
			'name' => 'required|max:255',
		];
	}

}