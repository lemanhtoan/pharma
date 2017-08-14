<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;

class GroupDrug extends Model  {

	use DatePresenter;

	protected $table = 'group_drugs';

}