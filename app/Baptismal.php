<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Baptismal extends Model
{
    use LogsActivity;
    
    protected static $logAttributes = ["*"];

    protected static $logName = 'Baptismal';

    protected static $logOnlyDirty = true;

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
