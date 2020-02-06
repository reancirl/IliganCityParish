<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baptismal extends Model
{
    protected $guarded = [];

     public function confirmation()
    {
        return $this->hasOne('App\Confirmation');
    }

    public function baptismalSponsors()
    {
        return $this->hasMany('App\BaptismalSponsor');
    }
    
    public function baptismalFacilitator()
    {
        return $this->hasOne('App\BaptismalFacilitator');
    }
}
