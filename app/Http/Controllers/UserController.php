<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $users = User::with('dept')->get();
        return view('admin.user.user',compact('users'));
    }

    public function create(Request $request){
        $request['password'] = '1234';
        User::create($request->all());
        return redirect('/users');
    }

    public function showUser(User $user){
        return $user;
    }

    public function update(User $user, Request $request){
        $user->update($request->all());
        return redirect('/users');
    }
}
