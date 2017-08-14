<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;

class District extends Model  {

	use DatePresenter;

	protected $table = 'districts';

}