<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\ActivityLookup;
use Carbon\Carbon;
use App\DailyTimeRecord;
use App\Leave;
use DB;

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

        $tasks = $this->user->load(['tasks'=>function($query){
            $query->where('production_date',$this->today)->get();
        }]);

        $task_lists = ActivityLookup::lists('description', 'description');

        return view('home', compact('tasks','task_lists'));
    }

    public function showAttendance(Request $request){
        $this->user = User::find(auth()->user()->id);

        $sql = "select id,operator_id,production_date,
                MIN((select time_log from daily_time_records as tin where in_out = 1 and tin.operator_id = tl.operator_id and (tin.time_log = tl.time_log)))as time_in,
                MAX((select time_log from daily_time_records as tout where in_out = 2 and tout.operator_id = tl.operator_id and (tout.time_log = tl.time_log))) as time_out
                from daily_time_records as tl where (production_date BETWEEN :date_from AND :date_to)
                AND operator_id = :operator_id group by operator_id,production_date order by operator_id";

        $biometrics = DB::select(DB::raw("$sql"),
            array('date_from' => str_to_carbon($request->date_from,'m/d/Y')->startOfDay(),'date_to' => str_to_carbon($request->date_to,'m/d/Y')->endOfDay(),'operator_id' => $this->user->employee_no)
        );

        return view('attendance', compact('biometrics'));


    }

    public function showPunch(Request $request){
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
