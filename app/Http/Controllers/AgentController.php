<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\ActivityLookup;
use Carbon\Carbon;
use App\DailyTimeRecord;
use App\Leave;

use Illuminate\Support\Facades\Auth;


class AgentController extends Controller
{
    public $user;

    public $today;

    public $auth_user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->today = Carbon::today()->toDateString();
        $this->auth_user = Auth::user();
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
        $page_title = "Attendance";
        $this->user = User::find(auth()->user()->id);

        $date_from = $request->date_from ? Carbon::createFromFormat('m/d/Y',$request->date_from) : Carbon::yesterday()->subDay(7);
        $date_to = $request->date_to ? Carbon::createFromFormat('m/d/Y',$request->date_to) : Carbon::yesterday();


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

        return view('attendance', compact('page_title','user_logins','biometrics','date1','date2'));

    }

    public function showPunch(Request $request){
        $page_title = "Attendance";
        $this->user = User::find(auth()->user()->id);

        $date_from = $request->date_from ? Carbon::createFromFormat('m/d/Y',$request->date_from) : Carbon::yesterday()->subDay(7);
        $date_to = $request->date_to ? Carbon::createFromFormat('m/d/Y',$request->date_to) : Carbon::yesterday();

        $date1= $date_from->format('m/d/Y');
        $date2 = $date_to->format('m/d/Y');

        $punches = DailyTimeRecord::where('operator_id',$this->user->employee_no)
            ->whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
            ->orderBy('time_log')->get();

        return view('punch', compact('page_title','punches','date1','date2'));

    }

    public function showLeave(Request $request){

        $page_title = "Manage Leave";
        $this->user = User::find(auth()->user()->id);

        $date_from = $request->date_from ? Carbon::createFromFormat('m/d/Y',$request->date_from) : Carbon::yesterday()->subDay(7);
        $date_to = $request->date_to ? Carbon::createFromFormat('m/d/Y',$request->date_to) : Carbon::yesterday();

        $date1= $date_from->format('m/d/Y');
        $date2 = $date_to->format('m/d/Y');

        $leaves = $this->auth_user->leaves()->get();

        return view('leave', compact('page_title','leaves','date1','date2'));
    }

    public function createLeave(Request $request){
        $request['leave_date'] = Carbon::createFromFormat('m/d/Y',$request->date_from)->format('Y-m-d');
        $request['user_id'] = auth()->user()->id;
        $request['status'] = 'Pending';
        Leave::create($request->all());
        return redirect('/agent_leave');
    }

    public function updateLeave(Leave $leave, Request $request){
        $request['leave_date'] = Carbon::createFromFormat('m/d/Y',$request->date_from)->format('Y-m-d');
        $leave->update($request->all());
        return redirect('/agent_leave');
    }

}
