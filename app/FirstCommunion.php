<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class FirstCommunion extends Model
{
    use LogsActivity;

    protected static $logAttributes = ["*"];

    protected static $logName = 'First Communion';

    protected static $logOnlyDirty = true;
    
	protected $guarded = [];

	public function baptismal()
    {
    	return $this->belongsTo('App\Baptismal');
    }
}
