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

    public function searchWife()
    {
        $confirmation = Confirmation::all();
        $wife = Wife::all();
        return view('pages.marriage_searchWife', compact('confirmation','wife'));
    }

    public function createWife($id)
    {
        $confirmation = Confirmation::findorFail($id);
        return view('pages.marriage_createWife', compact('confirmation'));
    }

    public function storeWife(Request $request, $id)
    {
        $this->validate($request , [
            'updated_parents_type_of_marriage' => 'required',
            'parents_marriage_place' => 'required',
            'status'=>'required',
            'education'=>'required',
        ]);

        $confirmation = Confirmation::findorFail($id);
        $wife = new Wife();

        $wife->confirmation_id = $confirmation->id;
        $wife->updated_parents_type_of_marriage = $request->updated_parents_type_of_marriage;
        $wife->parents_marriage_place = $request->parents_marriage_place;
        $wife->status = $request->status;
        $wife->education = $request->education;
        $wife->save();

        $wifeId = $wife->id;

        return redirect('/marriage/husband/'.$wifeId);
    }

    public function searchHusband($id)
    {
        $wife = Wife::findorFail($id);
        $confirmation = Confirmation::all();
        return view('pages.marriage_searchHusband', compact('confirmation','wife'));
    }
    
    public function createHusband($wifeId,$id)
    {
        $marriage = Marriage::all();
        $wife = Wife::findorFail($wifeId);
        $confirmation = Confirmation::findorFail($id);
        return view('pages.marriage_createHusband', compact('confirmation', 'wife','marriage'));
    }

    public function storeHusband(Request $request, $wifeId, $id)
    {
        $this->validate($request , [
            'updated_parents_type_of_marriage' => 'required',
            'parents_marriage_place' => 'required',
            'status'=>'required',
            'education'=>'required',
        ]);

        $confirmation = Confirmation::findorFail($id);
        $wife = Wife::findorFail($wifeId);
        $wId = $wife->id;
        $husband = new Husband();

        $husband->confirmation_id = $confirmation->id;
        $husband->updated_parents_type_of_marriage = $request->updated_parents_type_of_marriage;
        $husband->parents_marriage_place = $request->parents_marriage_place;
        $husband->status = $request->status;
        $husband->education = $request->education;
        $husband->save();

        $husbandId = $husband->id;
        return redirect ('/marriage/create/'.$wId.'/'.$husbandId);
    }

    public function create($wifeId,$husbandId)
    {
        $wife = Wife::findorFail($wifeId);
        $husband = Husband::findorFail($husbandId);
        return view('pages.marriage_create', compact('husband','wife'));
    }

    public function store(Request $request,$wifeId,$husbandId)
    {
        $this->validate($request , [
            'date' => 'required'
        ]);

        $marriage = new Marriage();
        $marriage->date = $request->date;
        $husband = Husband::findorFail($husbandId);
        $marriage->husband_id = $husband->id;
        $wife = Wife::findorFail($wifeId);
        $marriage->wife_id = $wife->id;

        $marriage->save();

        $marriageId = $marriage->id;

        return redirect('/marriage')->with('message','Marriage Record Added!');
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
    
    public function __construct()
    {
        $this->middleware('auth');
    }
}
