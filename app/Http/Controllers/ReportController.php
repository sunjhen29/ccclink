<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User_Login;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function showLogin()
    {
        $page_title = "Login Report";

        $login_report = User_Login::all();

        //return \Auth::guard('admin')->user();


        $user_login = new User_Login();
        $user_login->event = 'login';
        $user_login->user_id = 1;
        $user_login->save();

        return $user_login;


        event(new \App\Events\Login());


        return view("admin.reports.login",compact('page_title'));
    }
}
