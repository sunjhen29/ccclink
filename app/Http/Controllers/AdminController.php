<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Task;
use App\User_Login;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Dashboard";

        $headcount = User_Login::where('user_type','user')->where('production_date','=',Carbon::today()->toDateString())->groupBy('user_id')->get();
        $user_activities = Task::where("active",true)->get();

        $user_logins =User_Login::where('user_type','user')
            ->where('production_date','=',Carbon::today()->toDateString())->orderBy('created_at','desc')->limit(50)->get();

        return view("admin.dashboard",compact('page_title','user_activities','headcount','user_logins'));
    }



}
