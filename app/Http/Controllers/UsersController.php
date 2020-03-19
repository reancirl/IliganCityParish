<?php

namespace App\Http\Controllers;

use DB;
use Gate;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('pages.users_index',compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('pages.users_create',compact('roles'));
    }

    public function store(Request $request)
    {
         $this->validate($request , [
        'name' => 'required',
        'email' => 'required|email',
        ]);
        $checkEmail = User::where('email', $request->input('email'))->count();
        if($checkEmail != 0)
        {
            return redirect('users/create')->with('error','Email Already Taken');
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->church == null){
            $request->church = 'St.Michael The Archangel Parish';
        }
        $user->church = $request->church;
        $user->password = Hash::make('password');

        $newUserId = User::latest()->first();
        $newUserId = $newUserId->id;
        $newUser = $newUserId+1;
        $userId = $request->roles;

        if($userId == null){
            return redirect('users/create')->with('error','Choose a Role');
        }
        DB::table('role_user')->insert([
            'user_id' => $newUser,
            'role_id' => $userId
        ]);
        
        $user->save();

        return redirect('/users')->with('message', 'User has been updated');
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        $roles = Role::all();
        $roleId = implode($users->roles->pluck('id')->toArray());

        return view('pages.users_edit',compact('users','roles','roleId'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->roles()->sync($request->roles);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->church = $request->church;
        $user->save();

        return redirect('/users')->with('message', 'User added');
    }

    public function destroy($id)
    {

    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
