<?php

namespace App\Http\Controllers;

use App\Wife;
use App\Husband;
use App\Marriage;
use App\Baptismal;
use App\Confirmation;
use Illuminate\Http\Request;

class MarriageController extends Controller
{

    public function index()
    {
        $marriage = Marriage::all();
        return view('pages.marriage',compact('marriage'));
    }

    public function searchHusband()
    {
        $confirmation = Confirmation::all();
        return view('pages.marriage_searchHusband', compact('confirmation'));
    }
    
    public function createHusband($id)
    {
        $confirmation = Confirmation::findorFail($id);
        return view('pages.marriage_storeHusband', compact('confirmation'));
    }

    public function storeHusband(Request $request, $id)
    {
        $this->validate($request , [
            'updated_parents_type_of_marriage' => 'required',
            'parents_marriage_place' => 'required',
            'status'=>'required',
            'education'=>'required',
        ]);

        $confirmation = Confirmation::findorFail($id);
        $husband = new Husband();

        $husband->confirmation_id = $confirmation->id;
        $husband->updated_parents_type_of_marriage = $request->updated_parents_type_of_marriage;
        $husband->parents_marriage_place = $request->parents_marriage_place;
        $husband->status = $request->status;
        $husband->education = $request->education;
        $husband->save();

        return redirect ('/marriage');
    }

    public function searchWife($id)
    {

    }

    public function createWife($id)
    {

    }

    public function storeWife(Request $request)
    {

    }

    public function store(Request $request)
    {

    }

    public function show(Marriage $marriage)
    {

    }

    public function edit(Marriage $marriage)
    {

    }

    public function update(Request $request, Marriage $marriage)
    {

    }

    public function destroy(Marriage $marriage)
    {

    }
}
