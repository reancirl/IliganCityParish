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
        $countWeeklyMarriage = Marriage::with('husband')
                    ->orderBy('created_at', 'desc')->get()
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('W');
                    })->first();
        $countYearly = Confirmation::with('baptismal')
                    ->orderBy('created_at', 'desc')->get()
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->first();
        // $countMonthly = Baptismal::with('confirmation')
        //             ->orderBy('created_at', 'desc')->get()
        //             ->groupBy(function($date) {
        //                 return Carbon::parse($date->created_at)->format('M');
        //             })->take(1);
        // return $countMonthly;                  
        $baptismal = Baptismal::all();
        $confirmation = Confirmation::all();
        $marriage = Marriage::all();


        return view('home', compact('baptismal', 'confirmation', 'marriage', 'countWeeklyMarriage', 'countYearly'));
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
                    })->first();
        $confirmation = Confirmation::with('baptismal')
                    ->orderBy('created_at', 'desc')->get()
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->first();
        $baptismal = Baptismal::with('confirmation')
                    ->orderBy('created_at', 'desc')->get()
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('Y');
                    })->first();
        // $month = $baptismal->sortBy('created_at')
        //             ->groupBy(function($date) {
        //                 return Carbon::parse($date->created_at)->format('M');
        //             });
        // return $month;
        return view('pages.yearlyPDF', compact('marriage','confirmation', 'baptismal'));
    }

    // public function reportsindex()
    // {
    //     return view('pages.reports');
    // }
}
