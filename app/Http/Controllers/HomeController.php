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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $baptismal = Baptismal::all();
        $confirmation = Confirmation::all();
        $marriage = Marriage::all();
        return view('home', compact('baptismal', 'confirmation', 'marriage'));
    }

    public function reportsindex()
    {
        return view('pages.reports');
    }

    public function createPDF(){
        $marriage = Marriage::with('husband')
                    ->orderBy('created_at', 'desc')->get()
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('W');
                    });
        // return $marriage;
        // $try =$marriage->first();
        // return $try;
        // return $marriage;
        return view('weeklyPDF', compact('marriage'));
    }

    public function generatePDF(){
         $marriage = Marriage::with('husband')
                    ->orderBy('created_at', 'desc')->get()
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('W');
                    })->take(1);
        // return $marriage;
        $pdf = PDF::loadView('generatePDF', compact('marriage'));
        return $pdf->download('weekly_report.pdf');
    }    
}
