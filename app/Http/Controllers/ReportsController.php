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

        $cathedral_mar = Marriage::all()
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($cathedral_mar == null){
            $cathedral_mar = 0;
        }
        else $cathedral_mar = $cathedral_mar->count();

        $cathedral_con = Confirmation::all()
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('Y');
                        })->first();
        if($cathedral_con == null){
            $cathedral_con = 0;
        }
        else $cathedral_con = $cathedral_con->count();
        $year = date('Y');
        $year = Baptismal::whereYear('created_at', '=', $year);
        $jan = $year->whereMonth('created_at', '=', '01')->get()->count();
        $year = date('Y');
        $year = Baptismal::whereYear('created_at', '=', $year);
        $feb = $year->whereMonth('created_at', '=', '02')->get()->count();
        $year = date('Y');
        $year = Baptismal::whereYear('created_at', '=', $year);
        $mar = $year->whereMonth('created_at', '=', '03')->get()->count();
        $year = date('Y');
        $year = Baptismal::whereYear('created_at', '=', $year);
        $apr = $year->whereMonth('created_at', '=', '04')->get()->count();
        $year = date('Y');
        $year = Baptismal::whereYear('created_at', '=', $year);
        $may = $year->whereMonth('created_at', '=', '05')->get()->count();
        $year = date('Y');
        $year = Baptismal::whereYear('created_at', '=', $year);
        $jun = $year->whereMonth('created_at', '=', '06')->get()->count();
        $year = date('Y');
        $year = Baptismal::whereYear('created_at', '=', $year);
        $jul = $year->whereMonth('created_at', '=', '07')->get()->count();
        $year = date('Y');
        $year = Baptismal::whereYear('created_at', '=', $year);
        $aug = $year->whereMonth('created_at', '=', '08')->get()->count();
        $year = date('Y');
        $year = Baptismal::whereYear('created_at', '=', $year);
        $sep = $year->whereMonth('created_at', '=', '09')->get()->count();
        $year = date('Y');
        $year = Baptismal::whereYear('created_at', '=', $year);
        $oct = $year->whereMonth('created_at', '=', '10')->get()->count();
        $year = date('Y');
        $year = Baptismal::whereYear('created_at', '=', $year);
        $nov = $year->whereMonth('created_at', '=', '11')->get()->count();
        $year = date('Y');
        $year = Baptismal::whereYear('created_at', '=', $year);
        $dec = $year->whereMonth('created_at', '=', '12')->get()->count();
        $year = date('Y');
    	return view('reports.reports', compact('baptismal', 'confirmation', 'marriage', 'countWeeklyMarriage', 'countYearly','cathedral_mar','cathedral_con','jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec','year'));
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
        else $count;
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
    public function dioceseWeekly()
    {
        $marriage = Marriage::all()
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
        else $count;
        // return $count;
        return view('reports.dioceseWeekly', compact('marriage','count','previous'));
    }
    public function dioceseYearly()
    {
        $marriage = Marriage::all()
                    ->sortByDesc('created_at')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->first();
        if($marriage == null){
            $marriage = [];
        }
        else $marriage;
        $confirmation = Confirmation::all()
                    ->sortByDesc('created_at')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->first();
        if($confirmation == null){
            $confirmation = [];
        }
        else $confirmation;
        $baptismal = Baptismal::all()
                    ->sortByDesc('created_at')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->first();
        if($baptismal == null){
            $baptismal = [];
        }
        else $baptismal;

        return view('reports.dioceseYearly', compact('marriage','confirmation', 'baptismal'));
    }
    public function generateDioceseWeekly()
    {
        $marriage = Marriage::all()
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
        $pdf = PDF::loadView('reports.generateDioceseWeeklyPDF', compact('marriage','count'));
        return $pdf->download('diocese_weekly_report.pdf');
    }
    public function generateDioceseYearly()
    {
        $marriage = Marriage::all()
                    ->sortByDesc('created_at')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->first();
        if($marriage == null){
            $marriage = [];
        }else $marriage;
        $confirmation = Confirmation::all()
                    ->sortByDesc('created_at')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->first();
        if($confirmation == null){
            $confirmation =[];
        }else $confirmation;
        $baptismal = Baptismal::all()
                    ->sortByDesc('created_at')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->first();
        if($baptismal == null){
            $baptismal = [];
        }else $baptismal;

        $pdf = PDF::loadView('reports.generateDioceseYearlyPDF', compact('marriage','confirmation', 'baptismal'));
        return $pdf->download('diocese_yearly_report.pdf');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
