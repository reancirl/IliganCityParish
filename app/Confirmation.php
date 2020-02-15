<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
	protected $guarded = [];

	public function baptismal()
    {
    	return $this->belongsTo('App\Baptismal');
    }
    public function confirmationSponsors()
    {
        return $this->hasMany('App\ConfirmationSponsor');
    }
    public function wife()
    {
        return $this->hasOne('App\Wife');
    }
}
