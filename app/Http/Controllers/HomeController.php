<?php

namespace App\Http\Controllers;

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
}
