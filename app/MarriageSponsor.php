<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarriageSponsor extends Model
{
    public $timestamps = false;
	protected $guarded = [];
    public function marriage()
    {
    	return $this->belongsTo('App\Marriage');
    }
}
