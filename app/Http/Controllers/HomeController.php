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
                    })->take(1)->count();
        // return $countWeeklyMarriage;
        $countYearly = Confirmation::all()
                    ->sortByDesc('created_at')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->take(1)->count();
        $countMonthly = Baptismal::all()
                    ->sortByDesc('created_at')
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('M');
                    })->take(1)->count();
        // return $countMonthly;                  
        $baptismal = Baptismal::all()->count();
        // return $baptismal;
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
        $count = $marriage->take(1)->count();
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
        $pdf = PDF::loadView('generatePDF', compact('marriage','count'));
        return $pdf->download('weekly_report.pdf');
    }    

    public function createYearlyPDF(){
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
