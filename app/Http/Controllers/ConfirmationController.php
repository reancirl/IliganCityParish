<?php

namespace App\Http\Controllers;

use App\Baptismal;
use App\Confirmation;
use App\ConfirmationSponsor;
use Illuminate\Http\Request;

class ConfirmationController extends Controller
{

    public function index()
    {
        $confirmation = Confirmation::all();
        return view('pages.confirmation',compact('confirmation'));
    }

    public function searchBaptismal()
    {
        $baptismal = Baptismal::all();
        return view('pages.confirmation_add', compact('baptismal'));
    }

    public function create($id)
    {
        $baptismal = Baptismal::findorFail($id);
        return view('pages.confirmation_create', compact('baptismal'));
    }

    public function store(Request $request, $id)
    {
        $this->validate($request , [
            'date_of_seminar' => 'required|min:10',
            'date_of_confirmation' => 'required|min:10',
            'sponsor_name'=>'required',
            'sponsor_gender'=>'required',
        ]);

        $baptismal = Baptismal::find($id);

        $confirmation = new Confirmation();
        $confirmation->baptismal_id = $baptismal->id;
        $confirmation->date_of_seminar = $request->date_of_seminar;
        $confirmation->date_of_confirmation = $request->date_of_confirmation;
        $confirmation->church = $request->church;
        $confirmation->save();

        $sponsor = new ConfirmationSponsor();
        if(count($request->sponsor_name) > 0)
        {
            foreach($request->sponsor_name as $item=>$v)
            {
                $data2=array(
                    'confirmation_id'=>$confirmation->id,
                    'sponsor_name'=>$request->sponsor_name[$item],
                    'sponsor_gender'=>$request->sponsor_gender[$item]
                    );
                ConfirmationSponsor::insert($data2);
            }
        }

        return redirect('/confirmation')->with('message', 'Confirmation record added');
    }

    public function show($id)
    {
        $confirmation = Confirmation::findorFail($id);
        return view('pages.confirmation_show', compact('confirmation'));
    }

    public function edit($id)
    {
        $confirmation = Confirmation::findorFail($id);
        return view('pages.confirmation_edit', compact('confirmation'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request , [
            'date_of_seminar' => 'required',
            'date_of_confirmation' => 'required',
        ]);

        $confirmation = Confirmation::find($id);
        $confirmation->date_of_seminar = $request->date_of_seminar;
        $confirmation->date_of_confirmation = $request->date_of_confirmation;
        $confirmation->save();

        return redirect('/confirmation')->with('message', 'Baptismal record Updated');;
    }

    public function destroy(Confirmation $confirmation)
    {
        //
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
