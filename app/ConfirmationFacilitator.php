<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfirmationFacilitator extends Model
{
    public $timestamps = false;
	protected $guarded = [];
    public function confirmation()
    {
    	return $this->belongsTo('App\Confirmation');
    }
}
