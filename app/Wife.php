<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wife extends Model
{
	protected $guarded = [];
	public $timestamps = false;
	
    public function husband()
    {
        return $this->hasOne('App\Husband');
    }
}
