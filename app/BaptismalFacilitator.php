<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaptismalFacilitator extends Model
{
    public $timestamps = false;
	protected $guarded = [];
    public function baptismal()
    {
    	return $this->belongsTo('App\Baptismal');
    }
}
