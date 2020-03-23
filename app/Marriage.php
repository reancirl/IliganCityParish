<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Marriage extends Model
{
    use LogsActivity;
    
    protected static $logAttributes = ["*"];

    protected static $logName = "Marriage";

    protected static $logOnlyDirty = true;

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
