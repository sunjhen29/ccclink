<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;


class AgentController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware('auth');


    }

    public function index()
    {
        $this->user = User::find(auth()->user()->id);
        $page_title = "Activity Log";
        $tasks = $this->user->tasks;
        return view('home', compact('page_title','tasks'));
    }

    public function showAttendance(){
        $this->user = User::find(auth()->user()->id);
        $page_title = "View Time Logs";
        $user_logins = $this->user->user_logins;



        //$posts = Post::all()->groupBy(function($item){ return $item->created_at->format('d-M-y'); });
        return view('attendance', compact('page_title','user_logins'));
    }
}
