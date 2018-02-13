<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\ActivityLookup;
use Carbon\Carbon;


class AgentController extends Controller
{
    public $user;

    public $today;

    public function __construct()
    {
        $this->middleware('auth');
        $this->today = Carbon::today()->toDateString();

    }

    public function index()
    {
        $this->user = User::find(auth()->user()->id);
        $page_title = "Activity Log";
        $tasks = $this->user->load(['tasks'=>function($query){
            $query->where('production_date',$this->today)->get();
        }]);

        $task_lists = ActivityLookup::lists('description', 'description');

        return view('home', compact('page_title','tasks','task_lists'));
    }

    public function showAttendance(){
        $this->user = User::find(auth()->user()->id);

        $page_title = "View Time Logs";
        $user_logins = $this->user->load(['user_logins'=>function($query){
            $query->where('production_date',$this->today)->get();
        }]);

        return view('attendance', compact('page_title','user_logins'));
    }
}
