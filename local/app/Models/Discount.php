<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;

class Discount extends Model  {

	use DatePresenter;

	protected $table = 'config_discount';

}