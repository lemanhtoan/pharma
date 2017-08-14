<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;

class Drug extends Model  {

	use DatePresenter;

	protected $table = 'drugs';

	public function drug_img()
	{
		return $this->hasMany('App\Models\Drug_img','drug_id');
	}

}