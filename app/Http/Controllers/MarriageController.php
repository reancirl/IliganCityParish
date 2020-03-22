<?php

namespace App\Http\Controllers;

use DB;
use App\Wife;
use App\Husband;
use App\Marriage;
use App\Baptismal;
use App\Confirmation;
use App\MarriageSponsor;
use App\MarriageFacilitator;
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
        return view('pages.marriage_searchWife', compact('confirmation'));
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
            'status'=>'required',
            'education'=>'required'
        ]);

        $confirmation = Confirmation::findorFail($id);
        $wife = new Wife();

        $wife->confirmation_id = $confirmation->id;
        $wife->updated_parents_type_of_marriage = $request->updated_parents_type_of_marriage;
        $wife->status = $request->status;
        $wife->education = $request->education;
        $wife->parents_marriage_place = $request->parents_marriage_place;
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
            'date' => 'required',
            'date_of_seminar' => 'required',
            'church' => 'required',
            'sponsor_name'=>'required',
            'facilitator_1'=>'required',
            'facilitator_2'=>'required'
        ]);

        $marriage = new Marriage();
        $marriage->date = $request->date;
        $marriage->date_of_seminar = $request->date_of_seminar;
        $marriage->church = $request->church;
        $husband = Husband::findorFail($husbandId);
        $marriage->husband_id = $husband->id;
        $wife = Wife::findorFail($wifeId);
        $marriage->wife_id = $wife->id;
        $marriage->save();

        $sponsor = new MarriageSponsor();
        if(count($request->sponsor_name) > 0)
        {
            foreach($request->sponsor_name as $item=>$v)
            {
                $data2=array(
                    'marriage_id'=>$marriage->id,
                    'sponsor_name'=>$request->sponsor_name[$item],
                    );
                MarriageSponsor::insert($data2);
            }
        }

        $facilitator = new MarriageFacilitator;
        $facilitator->marriage_id = $marriage->id;
        $facilitator->facilitator_1 = $request->facilitator_1;
        $facilitator->facilitator_2 = $request->facilitator_2;
        $facilitator->facilitator_3 = $request->facilitator_3;
        $facilitator->save();

        return redirect('/marriage')->with('message','Marriage Record Added!');
    }

    public function show($id)
    {
        $marriage = Marriage::findorFail($id);
        $facilitator_3 = null;
        if ($marriage->marriageFacilitator->facilitator_3 == null)
        {
            $facilitator_3='None';
        }
        else
        {
            $facilitator_3 = $marriage->marriageFacilitator->facilitator_3;
        }
        $husband_parents = null;
        if ($marriage->husband->parents_marriage_place == null)
        {
            $husband_parents = 'None';
        }
        else
        {
            $husband_parents = $marriage->husband->parents_marriage_place;
        }
        $wife_parents = null;
        if ($marriage->wife->parents_marriage_place == null)
        {
            $wife_parents = 'None';
        }
        else
        {
            $wife_parents = $marriage->wife->parents_marriage_place;
        }
        if(auth()->user()->church == $marriage->church 
        || auth()->user()->church == 'St.Michael The Archangel Parish Church' 
        || auth()->user()->church == 'Diocese of Iligan') 
        {
            return view('pages.marriage_show', compact('marriage', 'facilitator_3','wife_parents','husband_parents'));
        } return redirect('/marriage')->with('error', 'Not authorized to view this Record');
    }

    public function edit($id)
    {
        $marriage = Marriage::findorFail($id);
        if(auth()->user()->church == $marriage->church 
        || auth()->user()->church == 'St.Michael The Archangel Parish Church' 
        || auth()->user()->church == 'Diocese of Iligan') 
        {
            return view('pages.marriage_edit', compact('marriage'));
        } return redirect('/marriage')->with('error', 'Not authorized to view this Record');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request , [
            'date' => 'required',
            'date_of_seminar' => 'required',
            'church' => 'required',
            'sponsor_name'=>'required',
            'facilitator_1'=>'required',
            'facilitator_2'=>'required'
        ]);

        $marriage = Marriage::findorFail($id);
        $marriage->date = $request->date;
        $marriage->date_of_seminar = $request->date_of_seminar;
        $marriage->church = $request->church;
        $marriage->update();

        $sponsor = $marriage->marriageSponsor;
        DB::table('marriage_sponsors')->where('marriage_id', $marriage->id)->delete();
        if(count($request->sponsor_name) > 0)
        {
            foreach($request->sponsor_name as $item=>$v)
            {
                $data2=array(
                    'marriage_id'=>$marriage->id,
                    'sponsor_name'=>$request->sponsor_name[$item],
                    );
                MarriageSponsor::insert($data2);
            }
        }

        $facilitator = $marriage->marriageFacilitator;
        $facilitator->marriage_id = $marriage->id;
        $facilitator->facilitator_1 = $request->facilitator_1;
        $facilitator->facilitator_2 = $request->facilitator_2;
        $facilitator->facilitator_3 = $request->facilitator_3;
        $facilitator->update();

        return redirect('/marriage')->with('message', 'Marriage record Updated');
    }

    public function destroy(Marriage $marriage)
    {

    }
    
    public function __construct()
    {
        $this->middleware('auth');
    }
}
