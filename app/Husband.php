<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Husband extends Model
{
	protected $guarded = [];
	public $timestamps = false;
	
    // public function marriage()
    // {
    //     return $this->hasOne('App\Marriage');
    // }
    // public function wife()
    // {
    // 	return $this->belongsTo('App\Wife');
    // }
}
