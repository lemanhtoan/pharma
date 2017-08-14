<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;

class UserLog extends Model  {

	use DatePresenter;

	protected $table = 'user_logs';

}