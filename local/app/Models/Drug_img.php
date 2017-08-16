<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drug_img extends Model
{
   	protected $table ='drug_image';
	protected $guarded =[];

	public function drugs()
    {
        return $this->belongsTo('App\Models\Drug','drug_id');
    }
}
