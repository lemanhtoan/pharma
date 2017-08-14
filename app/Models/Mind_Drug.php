<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mind_Drug extends Model
{
   	protected $table ='mind_drug';
	protected $guarded =[];

	public function drugs()
    {
        return $this->belongsTo('App\Models\Mind','mind_id');
    }
}
