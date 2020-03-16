<?php

namespace App\Http\Controllers;

use App\User;
use App\Roles;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('pages.users_index',compact('users'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function edit(User $user)
    {
        dd($user);
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
