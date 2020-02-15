<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wife extends Model
{
	protected $guarded = [];
	public $timestamps = false;
	
    // public function confirmation()
    // {
    //     return $this->belongsTo('App\Confirmation');
    // }
}
