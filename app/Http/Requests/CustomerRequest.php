<?php namespace App\Http\Requests;

use App\Models\Customer;

class CustomerRequest extends Request {

	public function rules()
	{
		return [
			'phone' => 'required|max:255|unique:customers',
			'password' => 'required',
		];
	}

}