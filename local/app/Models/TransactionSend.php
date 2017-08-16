<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;

class TransactionSend extends Model  {

	use DatePresenter;

	protected $table = 'transaction_send';

}