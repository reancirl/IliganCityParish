<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarriageFacilitator extends Model
{
    public $timestamps = false;
	protected $guarded = [];
    public function marriage()
    {
    	return $this->belongsTo('App\Marriage');
    }
}
