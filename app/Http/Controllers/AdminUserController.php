<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Admin;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $admins = Admin::all();
        return view('admin.settings.adminuser',compact('admins'));
    }

    public function create(Request $request){
        Admin::create($request->all());
        return redirect('/users');
    }

    public function showUser(Admin $admin){
        return $admin;
    }

    public function update(User $user, Request $request){
        $user->update($request->all());
        return redirect('/users');
    }
}
