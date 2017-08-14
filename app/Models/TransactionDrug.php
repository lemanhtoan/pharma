<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;

class TransactionDrug extends Model  {

	use DatePresenter;

	protected $table = 'transaction_drug';

}