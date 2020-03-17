<?php

namespace App\Http\Controllers;

use App\Baptismal;
use App\BaptismalSponsor;
use Illuminate\Http\Request;

class BaptismalController extends Controller
{

    public function index()
    {
        $baptismal = Baptismal::all();
        return view('pages.baptismal',compact('baptismal'));
    }

    public function create()
    {
        return view('pages.baptismal_create');
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
        'place_of_baptism' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
        'date_of_attending_seminar' => 'required|min:8',
        'date_of_baptism' => 'required|min:8',
        'fathers_name' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
        'mothers_maiden_name' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
        'parents_address' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
        'contact_number' => 'required',
        'parents_type_of_marriage' => 'required',
        'sponsor_name'=>'required',
        'sponsor_gender'=>'required',
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
        $baptismal->date_of_baptism = $request->date_of_baptism;
        $baptismal->fathers_name = $request->fathers_name;
        $baptismal->mothers_maiden_name = $request->mothers_maiden_name;
        $baptismal->parents_address = $request->parents_address;
        $baptismal->contact_number = $request->contact_number;
        $baptismal->parents_type_of_marriage = $request->parents_type_of_marriage;

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

        return redirect('/baptismal')->with('message', 'Baptismal record added');
    }

    public function show($id)
    {
        $baptismal = Baptismal::findorFail($id);
        return view('pages.baptismal_show', compact('baptismal'));
    }

    public function edit($id)
    {
        $baptismal = Baptismal::findorFail($id);
        return view('pages.baptismal_edit', compact('baptismal'));
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
            'place_of_baptism' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
            'date_of_attending_seminar' => 'required|min:8',
            'date_of_baptism' => 'required|min:8',
            'fathers_name' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
            'mothers_maiden_name' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
            'parents_address' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
            'contact_number' => 'required',
            'parents_type_of_marriage' => 'required',
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
   
        $sponsor = new BaptismalSponsor();
        // if(count($request->sponsor_name) > 0)
        // {
        //     foreach($request->sponsor_name as $item=>$v)
        //     {
        //         $data2=array(
        //             'baptismal_id'=>$baptismal->id,
        //             'sponsor_name'=>$request->sponsor_name[$item],
        //             'sponsor_gender'=>$request->sponsor_gender[$item]
        //             );
        //         BaptismalSponsor::insert($data2);
        //     }
        // }

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
