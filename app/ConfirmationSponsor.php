<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfirmationSponsor extends Model
{
    public $timestamps = false;
	protected $guarded = [];
    public function confirmation()
    {
    	return $this->belongsTo('App\Confirmation');
    }
}
