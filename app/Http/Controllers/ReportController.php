<?php

namespace App\Http\Controllers;

use App\DailyTimeRecord;
use App\TimeInTimeOut;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User_Login;
use Carbon\Carbon;
use App\User;
use App\Task;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function showLogin(Request $request)
    {
        $query = User_Login::query();

        if($request->user_id != '' ){
            $employee = User::where('employee_no',$request->user_id)->first();
            $query = $query->where('user_id',$employee->id);
        }

        $user_attendance = $query->where('user_type','user')
                ->whereBetween('production_date',[str_to_carbon($request->date_from,'m/d/Y')->startOfDay(),str_to_carbon($request->date_to,'m/d/Y')->endOfDay()])
                ->orderBy('production_date')
                ->groupBy('user_id','production_date')
                ->get();

        return view("admin.reports.login",compact('user_attendance'));
    }

    public function showActivity(Request $request)
    {
        $date_from = $request->date_from ? Carbon::createFromFormat('m/d/Y',$request->date_from) : Carbon::now();
        $date_to = $request->date_to ? Carbon::createFromFormat('m/d/Y',$request->date_to) : Carbon::now();
        $user_id = $request->user_id ? $request->user_id : '';

        if($request->user_id == '' ){
            $tasks = Task::whereBetween('production_date',[$date_from->startOfDay(),$date_to->endOfDay()])
                ->orderBy('production_date','user_id','created_at')
                ->get();
        }
        else{
            $employee = User::where('employee_no','=',$user_id)->first();

            $tasks = Task::where('user_id',$employee->id)
                ->whereBetween('production_date',[$date_from->startOfDay(),$date_to->endOfDay()])
                ->orderBy('production_date','user_id','created_at')
                ->get();
        }

        return view("admin.reports.activity",compact('tasks'));
    }

    public function showBiometric(Request $request){

        $query = DailyTimeRecord::whereBetween('time_log',[str_to_carbon($request->date_from,'m/d/Y')->startOfDay(),str_to_carbon($request->date_to,'m/d/Y')->endOfDay()]);

        if($request->user_id){
            $query->where('operator_id',$request->user_id);
        }elseif($request->department != ""){
            $operator_ids = User::select('employee_no')->where('department',$request->department)->get();
            $query->wherein('operator_id',$operator_ids);
        }

        $logs = $query->get();

        return view("admin.reports.biometric",compact('logs'));
    }

    public function showTimeInOut(Request $request){
        $sql = "select id,operator_id,production_date,
                MIN((select time_log from daily_time_records as tin where in_out = 1 and tin.operator_id = tl.operator_id and (tin.time_log = tl.time_log)))as time_in,
                MAX((select time_log from daily_time_records as tout where in_out = 2 and tout.operator_id = tl.operator_id and (tout.time_log = tl.time_log))) as time_out
                from daily_time_records as tl where (production_date BETWEEN :date_from AND :date_to) ";

        if($request->user_id == '' ){
            if($request->department == ""){
                $sql .= " group by operator_id,production_date order by operator_id";
                $biometrics = DB::select(DB::raw($sql),
                    array('date_from' => str_to_carbon($request->date_from,'m/d/Y')->startOfDay(),'date_to'=>str_to_carbon($request->date_to,'m/d/Y')->endOfDay()));
            } else {
                $operator_ids = User::select('employee_no')->where('department',$request->department)->get();
                $sql .= " AND operator_id IN (".$operator_ids->implode('employee_no',',').") group by operator_id,production_date order by operator_id ";
                $biometrics = DB::select(DB::raw($sql),
                    array('date_from' => str_to_carbon($request->date_from,'m/d/Y')->startOfDay(),'date_to'=>str_to_carbon($request->date_to,'m/d/Y')->endOfDay()));
            }

        } else {
            $sql .= " AND operator_id = :operator_id group by operator_id,production_date order by operator_id";
            $biometrics = DB::select(DB::raw("$sql"),
                array('date_from' => str_to_carbon($request->date_from,'m/d/Y')->startOfDay(),'date_to' => str_to_carbon($request->date_to,'m/d/Y')->endOfDay(),'operator_id' => $request->user_id)
            );
        }

        return view("admin.attendance.timeinout",compact('biometrics'));
    }

}
