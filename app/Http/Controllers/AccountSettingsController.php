<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;

class AccountSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('accountSettings');
    } 
   
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return redirect('/account-settings')->with('message', 'Password Updated');
    }

    public function edit()
    {
    	$user = auth()->user();
        return view('updateUsernameEmail',compact('user'));
    } 

    public function update(Request $request)
    {
    	$this->validate($request , [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('/account-settings-email-username')->with('message', 'Account Updated');
    }
}
