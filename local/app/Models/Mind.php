<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;

class Mind extends Model  {

	use DatePresenter;

	protected $table = 'minds';

    public function mind_drugs()
    {
        return $this->hasMany('App\Models\Mind_Drug','mind_id');
    }
}