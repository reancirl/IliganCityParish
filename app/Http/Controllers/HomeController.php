<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Carbon\Carbon;
use App\Marriage;
use App\Baptismal;
use App\Confirmation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $countWeeklyMarriage = Marriage::all()
                    ->sortByDesc('created_at')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('W');
                    })->first();
        if($countWeeklyMarriage == null){
            $countWeeklyMarriage = [];
        }
        else $countWeeklyMarriage;

        $countYearly = Confirmation::all()
                    ->sortByDesc('created_at')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->first();
        if($countYearly == null){
            $countYearly = [];
        }
        else $countYearly;

        $countMonthly = Baptismal::all()
                    ->sortByDesc('created_at')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('M');
                    })->first()->count();
        $baptismal = Baptismal::all()->count();
        $confirmation = Confirmation::all()->count();
        $marriage = Marriage::all()->count();

        return view('home', compact('baptismal', 'confirmation', 'marriage', 'countWeeklyMarriage', 'countYearly','countMonthly'));
    }


    public function createPDF(){
        $marriage = Marriage::with('husband')
                    ->orderBy('created_at', 'desc')->get()
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
        // return $previous;

        // return $marriage;
        return view('weeklyPDF', compact('marriage','count','previous'));
    }

    public function generatePDF(){
         $marriage = Marriage::with('husband')
                    ->orderBy('created_at', 'desc')->get()
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('W');
                    });
        // return count($marriage);
        $marriage = $marriage->take(1);
        $count = $marriage->first();
        if($count == null){
            $count = [];
        }
        else $count->count();
        $pdf = PDF::loadView('generatePDF', compact('marriage','count'));
        return $pdf->download('weekly_report.pdf');
    }    

    public function createYearlyPDF(){
        $marriage = Marriage::with('husband')
                    ->orderBy('created_at', 'desc')->get()
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->first();
        if($marriage == null){
            $marriage = [];
        }
        else $marriage;
        $confirmation = Confirmation::with('baptismal')
                    ->orderBy('created_at', 'desc')->get()
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->first();
        if($confirmation == null){
            $confirmation = 0;
        }
        else $confirmation;
        $baptismal = Baptismal::with('confirmation')
                    ->orderBy('created_at', 'desc')->get()
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->first();
        if($baptismal == null){
            $baptismal = [];
        }
        else $baptismal;
        // return $baptismal->count();

        // $month = $baptismal->sortBy('created_at')
        //             ->groupBy(function($date) {
        //                 return Carbon::parse($date->created_at)->format('M');
        //             });
        // return $month;
        return view('pages.yearlyPDF', compact('marriage','confirmation', 'baptismal'));
    }

    public function generateYearlyPDF(){
        $marriage = Marriage::with('husband')
                    ->orderBy('created_at', 'desc')->get()
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->take(1)->count();
        $confirmation = Confirmation::with('baptismal')
                    ->orderBy('created_at', 'desc')->get()
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->take(1)->count();
        $baptismal = Baptismal::with('confirmation')
                    ->orderBy('created_at', 'desc')->get()
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->take(1)->count();

        $pdf = PDF::loadView('generateYearlyPDF', compact('marriage','confirmation', 'baptismal'));
        return $pdf->download('yearly_report.pdf');
    }

    // public function reportsindex()
    // {
    //     return view('pages.reports');
    // }
}
