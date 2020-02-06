<?php

namespace App\Http\Controllers;

use App\Marriage;
use App\Confirmation;
use Illuminate\Http\Request;
use App\Baptismal;

class MarriageController extends Controller
{

    public function index()
    {
        $marriage = Marriage::all();
        return view('pages.marriage',compact('marriage'));
    }
    
    public function createHusband($id)
    {
        $confirmation = Confirmation::find($id);
        return view('pages.marriage_wife', compact('confirmation'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Marriage $marriage)
    {
        //
    }

    public function edit(Marriage $marriage)
    {
        //
    }

    public function update(Request $request, Marriage $marriage)
    {
        //
    }

    public function destroy(Marriage $marriage)
    {
        //
    }
}
