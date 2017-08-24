<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;

class Shipping extends Model  {

	use DatePresenter;

	protected $table = 'shipping_owner';

}