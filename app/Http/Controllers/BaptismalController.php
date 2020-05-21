<?php

namespace App\Http\Controllers;

use DB;
use App\Baptismal;
use App\BaptismalSponsor;
use App\BaptismalFacilitator;
use Illuminate\Http\Request;

class BaptismalController extends Controller
{

    public function index()
    {
        $baptismal = Baptismal::all();
        return view('baptismal.baptismal',compact('baptismal'));
    }

    public function create()
    {
        return view('baptismal.baptismal_create');
    }

    public function store(Request $request)
    {
        $this->validate($request , [
        'first_name' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
        'last_name' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
        'middle_name' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
        'date_of_birth' => 'required|min:8',
        'gender' => 'required',
        'place_of_birth' => 'required|regex:/^[\pL\s\-]+$/u|min:6',
        'date_of_attending_seminar' => 'required|min:8',
        'date_of_baptism' => 'required|min:8',
        'fathers_name' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
        'mothers_maiden_name' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
        'parents_address' => 'required|min:2',
        'contact_number' => 'required',
        'parents_type_of_marriage' => 'required',
        'sponsor_name'=>'required',
        'sponsor_gender'=>'required',
        'facilitator_1' => 'required',
        'facilitator_2' => 'required',
        ]);

        $baptismal = new Baptismal();
        $baptismal->first_name = $request->first_name;
        $baptismal->last_name = $request->last_name;
        $baptismal->middle_name = $request->middle_name;
        $baptismal->date_of_birth = $request->date_of_birth;
        $baptismal->gender = $request->gender;
        $baptismal->place_of_birth =$request->place_of_birth;
        $baptismal->place_of_baptism = $request->place_of_baptism;
        $baptismal->date_of_attending_seminar = $request->date_of_attending_seminar;
        $baptismal->fathers_name = $request->fathers_name;
        $baptismal->mothers_maiden_name = $request->mothers_maiden_name;
        $baptismal->parents_address = $request->parents_address;
        $baptismal->contact_number = $request->contact_number;
        $baptismal->parents_type_of_marriage = $request->parents_type_of_marriage;

        $month = $request->date_of_baptism;
        $baptismal->date_of_baptism = $month . ", " ."10:30-12:00";
        $check = Baptismal::where('date_of_baptism', $baptismal->date_of_baptism)->count();
        if($check != 0)
        {
            return redirect('baptismal/create')->with('error','Date and time already full.');
        }
        // return $baptismal->date_of_baptism;

        $baptismal->save();

        $sponsor = new BaptismalSponsor();
        if(count($request->sponsor_name) > 0)
        {
            foreach($request->sponsor_name as $item=>$v)
            {
                $data2=array(
                    'baptismal_id'=>$baptismal->id,
                    'sponsor_name'=>$request->sponsor_name[$item],
                    'sponsor_gender'=>$request->sponsor_gender[$item]
                    );
                BaptismalSponsor::insert($data2);
            }
        }
        $facilitator = new BaptismalFacilitator;
        $facilitator->baptismal_id = $baptismal->id;
        $facilitator->facilitator_1 = $request->facilitator_1;
        $facilitator->facilitator_2 = $request->facilitator_2;
        $facilitator->facilitator_3 = $request->facilitator_3;
        $facilitator->save();

        return redirect('/baptismal')->with('message', 'Baptismal record added');
    }

    public function show($id)
    {
        $baptismal = Baptismal::findorFail($id);
        $facilitator_3 = null;
        if ($baptismal->baptismalFacilitator->facilitator_3 == null)
        {
            $facilitator_3='None';
        }
        else
        {
            $facilitator_3 = $baptismal->baptismalFacilitator->facilitator_3;
        }
        if(auth()->user()->church == $baptismal->place_of_baptism 
        || auth()->user()->church == 'St.Michael The Archangel Parish Church' 
        || auth()->user()->church == 'Diocese of Iligan') 
        {
            return view('baptismal.baptismal_show', compact('baptismal','facilitator_3'));
        } return redirect('/baptismal')->with('error', 'Not authorized to view this Record');
    }

    public function edit($id)
    {
        $baptismal = Baptismal::findorFail($id);
        if(auth()->user()->church == $baptismal->place_of_baptism 
        || auth()->user()->church == 'St.Michael The Archangel Parish Church' 
        || auth()->user()->church == 'Diocese of Iligan') 
        {
            return view('baptismal.baptismal_edit', compact('baptismal'));
        } return redirect('/baptismal')->with('error', 'Not authorized to view this Record');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request , [
            'first_name' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
            'last_name' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
            'middle_name' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
            'date_of_birth' => 'required|min:8',
            'gender' => 'required',
            'place_of_birth' => 'required|regex:/^[\pL\s\-]+$/u|min:6',
            'date_of_attending_seminar' => 'required|min:8',
            'date_of_baptism' => 'required|min:8',
            'fathers_name' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
            'mothers_maiden_name' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
            'parents_address' => 'required',
            'contact_number' => 'required',
            'parents_type_of_marriage' => 'required',
            'facilitator_1' => 'required',
            'facilitator_2' => 'required',
            'sponsor_name'=>'required',
            'sponsor_gender'=>'required',
        ]);

        $baptismal = Baptismal::find($id);
        $baptismal->first_name = $request->first_name;
        $baptismal->last_name = $request->last_name;
        $baptismal->middle_name = $request->middle_name;
        $baptismal->date_of_birth = $request->date_of_birth;
        $baptismal->gender = $request->gender;
        $baptismal->place_of_birth =$request->place_of_birth;
        $baptismal->place_of_baptism = $request->place_of_baptism;
        $baptismal->date_of_attending_seminar = $request->date_of_attending_seminar;
        $baptismal->date_of_baptism = $request->date_of_baptism;
        $baptismal->fathers_name = $request->fathers_name;
        $baptismal->mothers_maiden_name = $request->mothers_maiden_name;
        $baptismal->parents_address = $request->parents_address;
        $baptismal->contact_number = $request->contact_number;
        $baptismal->parents_type_of_marriage = $request->parents_type_of_marriage;
        $baptismal->update();
        
        if(count($request->sponsor_name) > 0)
        {
            DB::table('baptismal_sponsors')->where('baptismal_id', $baptismal->id)->delete();
            foreach($request->sponsor_name as $item=>$v)
            {
                $data2=array(
                    'baptismal_id'=>$baptismal->id,
                    'sponsor_name'=>$request->sponsor_name[$item],
                    'sponsor_gender'=>$request->sponsor_gender[$item]
                    );
                BaptismalSponsor::insert($data2);
            }
        }
        $facilitator = $baptismal->BaptismalFacilitator;
        $facilitator->baptismal_id = $baptismal->id;
        $facilitator->facilitator_1 = $request->facilitator_1;
        $facilitator->facilitator_2 = $request->facilitator_2;
        $facilitator->facilitator_3 = $request->facilitator_3;
        $facilitator->save();
        return redirect('/baptismal')->with('message', 'Baptismal record Updated');
    }

    public function destroy(Baptismal $baptismal)
    {
        
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
