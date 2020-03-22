<?php

namespace App\Http\Controllers;

use DB;
use App\Baptismal;
use App\Confirmation;
use App\ConfirmationSponsor;
use App\ConfirmationFacilitator;
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
            'church' => 'required',
            'sponsor_name'=>'required',
            'sponsor_gender'=>'required',
            'facilitator_1'=>'required',
            'facilitator_2'=>'required',
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

        $facilitator = new ConfirmationFacilitator;
        $facilitator->confirmation_id = $confirmation->id;
        $facilitator->facilitator_1 = $request->facilitator_1;
        $facilitator->facilitator_2 = $request->facilitator_2;
        $facilitator->facilitator_3 = $request->facilitator_3;
        $facilitator->save();

        return redirect('/confirmation')->with('message', 'Confirmation record added');
    }

    public function show($id)
    {
        $confirmation = Confirmation::findorFail($id);
        $facilitator_3 = null;
        if ($confirmation->confirmationFacilitator->facilitator_3 == null)
        {
            $facilitator_3='None';
        }
        else
        {
            $facilitator_3 = $confirmation->confirmationFacilitator->facilitator_3;
        }
        if(auth()->user()->church == $confirmation->church 
        || auth()->user()->church == 'St.Michael The Archangel Parish Church' 
        || auth()->user()->church == 'Diocese of Iligan') 
        {
            return view('pages.confirmation_show', compact('confirmation', 'facilitator_3'));
        } return redirect('/confirmation')->with('error', 'Not authorized to view this Record');
    }

    public function edit($id)
    {
        $confirmation = Confirmation::findorFail($id);
        if(auth()->user()->church == $confirmation->church 
        || auth()->user()->church == 'St.Michael The Archangel Parish Church' 
        || auth()->user()->church == 'Diocese of Iligan') 
        {
            return view('pages.confirmation_edit', compact('confirmation'));
        } return redirect('/confirmation')->with('error', 'Not authorized to view this Record');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request , [
            'date_of_seminar' => 'required|min:10',
            'date_of_confirmation' => 'required|min:10',
            'church' => 'required',
            'sponsor_name'=>'required',
            'sponsor_gender'=>'required',
            'facilitator_1'=>'required',
            'facilitator_2'=>'required',
        ]);

        $confirmation = Confirmation::find($id);
        $confirmation->date_of_seminar = $request->date_of_seminar;
        $confirmation->date_of_confirmation = $request->date_of_confirmation;
        $confirmation->church = $request->church;
        $confirmation->update();

        $sponsor = $confirmation->confirmationSponsors;
        DB::table('confirmation_sponsors')->where('confirmation_id', $confirmation->id)->delete();
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

        $facilitator = $confirmation->confirmationFacilitator;
        $facilitator->confirmation_id = $confirmation->id;
        $facilitator->facilitator_1 = $request->facilitator_1;
        $facilitator->facilitator_2 = $request->facilitator_2;
        $facilitator->facilitator_3 = $request->facilitator_3;
        $facilitator->update();

        return redirect('/confirmation')->with('message', 'Confirmation record Updated');
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
