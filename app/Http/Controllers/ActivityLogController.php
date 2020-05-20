<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    public function index()
    {
        $activity = Activity::all()
                    ->sortby('id')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->first()->skip(1);
        $activity = $activity->sortbyDesc('id');
        // return $activity;
        return view('activitylog.index',compact('activity'));
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
