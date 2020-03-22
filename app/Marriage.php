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
	public function wife()
    {
    	return $this->belongsTo('App\Wife');
    }
    public function marriageSponsors()
    {
        return $this->hasMany('App\MarriageSponsor');
    }
    public function marriageFacilitator()
    {
        return $this->hasOne('App\MarriageFacilitator');
    }
}
