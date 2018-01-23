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

        return view("admin.reports.login",compact('page_title'));
    }
}
