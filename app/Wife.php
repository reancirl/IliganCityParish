<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wife extends Model
{
	protected $guarded = [];
	public $timestamps = false;
	
    public function marriage()
    {
        return $this->hasOne('App\Marriage');
    }
    public function confirmation()
    {
        return $this->belongsTo('App\Confirmation');
    }
}
