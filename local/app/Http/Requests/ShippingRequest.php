<?php namespace App\Http\Requests;

use App\Models\Shipping;

class ShippingRequest extends Request {

	public function rules()
	{
		return [
			'name' => 'required|max:255'
		];
	}

}