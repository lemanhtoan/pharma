<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;

class Customer extends Model  {

	use DatePresenter;

	protected $table = 'customers';

}