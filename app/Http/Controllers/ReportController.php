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
        $date_from = $request->date_from ? Carbon::createFromFormat('m/d/Y',$request->date_from) : Carbon::now();
        $date_to = $request->date_to ? Carbon::createFromFormat('m/d/Y',$request->date_to) : Carbon::now();
        $user_id = $request->user_id ? $request->user_id : '';

        $date1= $date_from->format('m/d/Y');
        $date2 = $date_to->format('m/d/Y');

        $page_title = "Reports";

        if($request->user_id == '' ){
            $user_attendance = User_Login::where('user_type','user')
                ->whereBetween('production_date',[$date_from->startOfDay(),$date_to->endOfDay()])
                ->groupBy('user_id','production_date')
                ->orderBy('production_date')
                ->get();
        }
        else{
            $employee = User::where('employee_no','=',$user_id)->first();

            $user_attendance = User_Login::where('user_id',$employee->id)
                ->whereBetween('created_at',[$date_from->startOfDay(),$date_to->endOfDay()])
                ->orderBy('production_date')
                ->groupBy('user_id','production_date')->get();
        }

        return view("admin.reports.login",compact('page_title','user_attendance','date1','date2','user_id'));
    }

    public function showActivity(Request $request)
    {
        $date_from = $request->date_from ? Carbon::createFromFormat('m/d/Y',$request->date_from) : Carbon::now();
        $date_to = $request->date_to ? Carbon::createFromFormat('m/d/Y',$request->date_to) : Carbon::now();
        $user_id = $request->user_id ? $request->user_id : '';

        $date1= $date_from->format('m/d/Y');
        $date2 = $date_to->format('m/d/Y');

        $page_title = "Reports";


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

        return view("admin.reports.activity",compact('page_title','tasks','date1','date2','user_id'));
    }

    public function showBiometric(Request $request){
        if($request->user_id == '' ){
            $logs = DailyTimeRecord::whereBetween('time_log',[str_to_carbon($request->date_from,'m/d/Y')->startOfDay(),str_to_carbon($request->date_to,'m/d/Y')->endOfDay()])->get();
        }
        else{
            $logs = DailyTimeRecord::whereBetween('time_log',[str_to_carbon($request->date_from,'m/d/Y')->startOfDay(),str_to_carbon($request->date_to,'m/d/Y')->endOfDay()])
                ->where('operator_id',$request->user_id)->get();
        }
        return view("admin.reports.biometric",compact('logs'));
    }

    public function showTimeInOut(Request $request){
        $sql = "select id,operator_id,production_date,
                MIN((select time_log from daily_time_records as tin where in_out = 1 and tin.operator_id = tl.operator_id and (tin.time_log = tl.time_log)))as time_in,
                MAX((select time_log from daily_time_records as tout where in_out = 2 and tout.operator_id = tl.operator_id and (tout.time_log = tl.time_log))) as time_out
                from daily_time_records as tl";

        if($request->user_id == '' ){
            $sql .= " where (production_date BETWEEN :date_from AND :date_to) group by operator_id,production_date order by operator_id";
            $biometrics = DB::select(DB::raw($sql),
                array('date_from' => str_to_carbon($request->date_from,'m/d/Y')->startOfDay(),'date_to'=>str_to_carbon($request->date_to,'m/d/Y')->endOfDay()));
        }else {
            $sql .= " where (production_date BETWEEN :date_from AND :date_to) AND operator_id = :operator_id group by operator_id,production_date order by operator_id";
            $biometrics = DB::select(DB::raw("$sql"),
                array('date_from' => str_to_carbon($request->date_from,'m/d/Y')->startOfDay(),'date_to' => str_to_carbon($request->date_to,'m/d/Y')->endOfDay(),'operator_id' => $request->user_id)
            );
        }
        return view("admin.attendance.timeinout",compact('biometrics'));
    }

}
