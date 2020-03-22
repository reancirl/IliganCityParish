<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Carbon\Carbon;
use App\Marriage;
use App\Baptismal;
use App\Confirmation;
use Illuminate\Http\Request;
class ReportsController extends Controller
{
    public function index()
    {
        $church = \Auth::user()->church;
    	$countWeeklyMarriage = Marriage::all()
    	 			->where('church',$church)
                    ->sortByDesc('created_at')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('W');
                    })->first();
        if($countWeeklyMarriage == null){
            $countWeeklyMarriage = [];
        }
        else $countWeeklyMarriage;

        $countYearly = Confirmation::all()
        			->where('church',$church)
                    ->sortByDesc('created_at')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->first();
        if($countYearly == null){
            $countYearly = [];
        }
        else $countYearly;

        $baptismal = Baptismal::all()->where('place_of_baptism',$church)->count();
        $confirmation = Confirmation::all()->where('church',$church)->count();
        $marriage = Marriage::all()->where('church',$church)->count();

    	return view('reports.reports', compact('baptismal', 'confirmation', 'marriage', 'countWeeklyMarriage', 'countYearly'));
    }
    public function weekly()
    {
    	$church = \Auth::user()->church;
    	$marriage = Marriage::all()
    				->where('church',$church)
                    ->sortByDesc('created_at')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('W');
                    });
        $previous = $marriage->skip(1);
        $marriage = $marriage->take(1);
        $count = $marriage->first();
        if($count == null){
            $count = [];
        }
        else $count->count();
    	return view('reports.weeklyPDF', compact('marriage','count','previous'));
    }
    public function yearly()
    {
    	$church = \Auth::user()->church;
    	$marriage = Marriage::all()
    				->where('church',$church)
                    ->sortByDesc('created_at')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->first();
        if($marriage == null){
            $marriage = [];
        }
        else $marriage;
        $confirmation = Confirmation::all()
        			->where('church',$church)
                    ->sortByDesc('created_at')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->first();
        if($confirmation == null){
            $confirmation = [];
        }
        else $confirmation;
        $baptismal = Baptismal::all()
        			->where('place_of_baptism',$church)
                    ->sortByDesc('created_at')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->first();
        if($baptismal == null){
            $baptismal = [];
        }
        else $baptismal;

    	return view('reports.yearlyPDF', compact('marriage','confirmation', 'baptismal'));
    }
    public function generateWeekly()
    {
    	$church = \Auth::user()->church;
    	$marriage = Marriage::all()
                    ->where('church',$church)
                    ->sortByDesc('created_at')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('W');
                    });
        $marriage = $marriage->take(1);
        $count = $marriage->first();
        if($count == null){
            $count = [];
        }
        else $count;
        $pdf = PDF::loadView('reports.generatePDF', compact('marriage','count'));
        return $pdf->download('weekly_report.pdf');
    }
    public function generateYearly()
    {
    	$church = \Auth::user()->church;
    	$marriage = Marriage::all()
                    ->where('church',$church)
                    ->sortByDesc('created_at')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->first();
        if($marriage == null){
            $marriage = [];
        }else $marriage;
        $confirmation = Confirmation::all()
                    ->where('church',$church)
                    ->sortByDesc('created_at')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->first();
        if($confirmation == null){
            $confirmation =[];
        }else $confirmation;
        $baptismal = Baptismal::all()
                    ->where('place_of_baptism',$church)
                    ->sortByDesc('created_at')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->first();
        if($baptismal == null){
            $baptismal = [];
        }else $baptismal;

        $pdf = PDF::loadView('reports.generateYearlyPDF', compact('marriage','confirmation', 'baptismal'));
        return $pdf->download('yearly_report.pdf');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
