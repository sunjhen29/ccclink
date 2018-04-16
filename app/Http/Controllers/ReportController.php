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

    public function showBiometricbackup(Request $request){
        $date_from = $request->date_from ? Carbon::createFromFormat('m/d/Y',$request->date_from) : Carbon::now();
        $date_to = $request->date_to ? Carbon::createFromFormat('m/d/Y',$request->date_to) : Carbon::now();
        $user_id = $request->user_id ? $request->user_id : '';

        $date1= $date_from->format('m/d/Y');
        $date2 = $date_to->format('m/d/Y');

        $page_title = "Biometric";


        if($request->user_id == '' ){

            //$biometrics = DailyTimeRecord::whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
            //    ->where('in_out',1)
            //    ->groupBy('operator_id')
            //   ->orderBy('operator_id')
            //   ->get();

            //$biometrics = DailyTimeRecord::whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
            //    ->where('in_out',2)
            //    ->orderBy('time_log','desc')
            //    ->groupBy('operator_id')
            //    ->get();


            //$biometrics = DailyTimeRecord::whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])


            $biometrics = DailyTimeRecord::selectraw('operator_id,in_out,max(time_log) as time_log')
                ->whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
                ->where('in_out',2)
                ->groupBy('operator_id','in_out')
                ->get();

            //  return $biometrics;

            // $biometrics = DailyTimeRecord::whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
            //     ->orderBy('production_date')
            //    ->get();
        }
        else{
            $biometrics = DailyTimeRecord::where('operator_id',$user_id)
                ->whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
                ->orderBy('production_date')
                ->get();
        }

        return view("admin.reports.biometric",compact('page_title','biometrics','date1','date2','user_id'));
    }

    public function showBiometric(Request $request){
        $date_from = $request->date_from ? Carbon::createFromFormat('m/d/Y',$request->date_from) : Carbon::now();
        $date_to = $request->date_to ? Carbon::createFromFormat('m/d/Y',$request->date_to) : Carbon::now();
        $user_id = $request->user_id ? $request->user_id : '';

        $date1= $date_from->format('m/d/Y');
        $date2 = $date_to->format('m/d/Y');

        $page_title = "Biometric";


        if($request->user_id == '' ){
          $checkout = DailyTimeRecord::selectraw('operator_id,in_out,max(time_log) as time_log,production_date')
                ->whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
                ->where('in_out',2)
                ->groupBy('operator_id','in_out','production_date');
                //->get();

            $biometrics = DailyTimeRecord::selectraw('operator_id,in_out,time_log,production_date')
                ->whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
                ->where('in_out',1)
                ->union($checkout)
                ->groupBy('operator_id','in_out','production_date')
                ->orderBy('production_date','asc')
                ->orderBy('operator_id','asc')
                ->orderBy('in_out','asc')
                ->get();
        }
        else{
            $checkout = DailyTimeRecord::selectraw('operator_id,in_out,max(time_log) as time_log,production_date')
                ->where('operator_id',$user_id)
                ->whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
                ->where('in_out',2)
                ->groupBy('production_date','operator_id','in_out');
            //->get();

            $biometrics = DailyTimeRecord::selectraw('operator_id,in_out,time_log,production_date')
                ->where('operator_id',$user_id)
                ->whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
                ->where('in_out',1)
                ->union($checkout)
                ->groupBy('production_date','operator_id','in_out')
                ->orderBy('production_date','asc')
                ->orderBy('operator_id','asc')
                ->orderBy('in_out','asc')
                ->get();


           // $biometrics = DailyTimeRecord::where('operator_id',$user_id)
             //   ->whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
              //  ->orderBy('production_date')
               // ->get();
        }

        return view("admin.reports.biometric",compact('page_title','biometrics','date1','date2','user_id'));
    }

    public function showTimeInOut(Request $request){
        $date_from = $request->date_from ? Carbon::createFromFormat('m/d/Y',$request->date_from) : Carbon::now();
        $date_to = $request->date_to ? Carbon::createFromFormat('m/d/Y',$request->date_to) : Carbon::now();
        $user_id = $request->user_id ? $request->user_id : '';

        $date1= $date_from->format('m/d/Y');
        $date2 = $date_to->format('m/d/Y');

        $page_title = "Time In / Time Out";


        if($request->user_id == '' ){
            $biometrics = TimeInTimeOut::whereBetween('work_date',[$date_from->startOfDay(),$date_to->endOfDay()])
                ->orderBy('work_date')
                ->get();
        }
        else{
            $biometrics = TimeInTimeOut::where('employee_no',$user_id)
                ->whereBetween('work_date',[$date_from->startOfDay(),$date_to->endOfDay()])
                ->orderBy('work_date')
                ->get();
        }

        return view("admin.reports.timeinout",compact('page_title','biometrics','date1','date2','user_id'));
    }


}
