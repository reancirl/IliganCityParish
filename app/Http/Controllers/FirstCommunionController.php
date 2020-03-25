<?php

namespace App\Http\Controllers;

use App\Baptismal;
use App\FirstCommunion;
use Illuminate\Http\Request;

class FirstCommunionController extends Controller
{

    public function index()
    {
        $communion = FirstCommunion::all();
        return view('communion.index',compact('communion'));
    }

    public function search()
    {
        $communion = Baptismal::all();
        return view('communion.search',compact('communion'));
    }

    public function create($id)
    {
        $communion = Baptismal::findorFail($id);
        return view('communion.create',compact('communion'));
    }

    public function store(Request $request,$id)
    {
        $this->validate($request , [
            'church' => 'required',
        ]);

        $baptismal = Baptismal::findorFail($id);

        $communion = new FirstCommunion();
        $communion->baptismal_id = $baptismal->id;
        $communion->church = $request->church;
        $communion->save();

        return redirect('/first-communion')->with('message', 'First Communion record added');
    }

    public function edit($id)
    {
        $communion = FirstCommunion::findorFail($id);
        $baptismal = $communion->baptismal;
        return view('communion.edit', compact('communion','baptismal'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request , [
            'church' => 'required',
        ]);

        $communion = FirstCommunion::findorFail($id);

        $communion->church = $request->church;
        $communion->update();

        return redirect('/first-communion')->with('message', 'First Communion record updated');
    }

    public function destroy($id)
    {
        $communion = FirstCommunion::findorFail($id);
        if(auth()->user()->church == $communion->church 
        || auth()->user()->church == 'St.Michael The Archangel Parish Church' 
        || auth()->user()->church == 'Diocese of Iligan') 
        {
            $communion->delete();
            return redirect('/first-communion')->with('message', 'News Deleted!');
        } return redirect('/first-communion')->with('error', 'Not authorized to Delete this Record');
    }
}
