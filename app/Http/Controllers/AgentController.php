<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\ActivityLookup;
use Carbon\Carbon;
use App\DailyTimeRecord;


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

    public function showAttendance(Request $request){
        $page_title = "Daily Time Record";
        $this->user = User::find(auth()->user()->id);

        $date_from = $request->date_from ? Carbon::createFromFormat('m/d/Y',$request->date_from) : Carbon::yesterday()->subDay(7);
        $date_to = $request->date_to ? Carbon::createFromFormat('m/d/Y',$request->date_to) : Carbon::yesterday();
        $user_id = $request->user_id ? $request->user_id : '';

        $date1= $date_from->format('m/d/Y');
        $date2 = $date_to->format('m/d/Y');


        $user_logins = $this->user->load(['user_logins'=>function($query){
            $query->where('production_date',$this->today)->get();
        }]);

        $checkout = DailyTimeRecord::selectraw('operator_id,DATE_FORMAT(production_date,"%d/%m/%Y") as production_date,TIME(max(time_log)) as time_log,IF(in_out = 1, "0", "1") as in_out')
            ->where('operator_id',$this->user->employee_no)
            ->whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
            ->where('in_out',2)
            ->groupBy('production_date','operator_id','in_out');
        $biometrics = DailyTimeRecord::selectraw('operator_id,DATE_FORMAT(production_date,"%d/%m/%Y") as production_date,TIME(time_log) as time_log,IF(in_out = 1, "0", "1") as in_out')
            ->where('operator_id',$this->user->employee_no)
            ->whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
            ->where('in_out',1)
            ->union($checkout)
            ->groupBy('production_date','operator_id','in_out')
            ->orderBy('production_date','asc')
            ->orderBy('operator_id','asc')
            ->orderBy('in_out','asc')
            ->get();

        return view('attendance', compact('page_title','user_logins','biometrics','date1','date2','user_id'));

    }
}
