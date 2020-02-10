<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marriage extends Model
{
	protected $guarded = [];
	
	public function husband()
    {
    	return $this->belongsTo('App\Husband');
    }
}
