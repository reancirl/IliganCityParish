<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Confirmation extends Model
{
    use LogsActivity;

    protected static $logAttributes = ["*"];

    protected static $logName = 'Confirmation';

    protected static $logOnlyDirty = true;
    
	protected $guarded = [];

	public function baptismal()
    {
    	return $this->belongsTo('App\Baptismal');
    }
    public function confirmationSponsors()
    {
        return $this->hasMany('App\ConfirmationSponsor');
    }
    public function confirmationFacilitator()
    {
        return $this->hasOne('App\ConfirmationFacilitator');
    }
    public function wife()
    {
        return $this->hasOne('App\Wife');
    }
    public function husband()
    {
        return $this->hasOne('App\Husband');
    }
}
