<?php namespace App\Http\Requests;

use App\Models\GroupDrug;

class GroupDrugRequest extends Request {

	public function rules()
	{
		return [
			'short_name' => 'required|max:255',
			'full_name' => 'required|max:255',
		];
	}

}