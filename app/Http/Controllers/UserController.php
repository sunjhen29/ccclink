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
        $page_title = "Manage User";
        $users = User::all();

        return view('admin.user.user',compact('page_title','users'));
    }

    public function create(Request $request){

        User::create($request->all());

        return User::all();

    }

    public function showUser(User $user){
        return $user;
    }

    public function update(User $user, Request $request){
        $user->update($request->all());
        return redirect('/users');
    }
}
