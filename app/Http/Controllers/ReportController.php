<?php

namespace App\Http\Controllers;

use App\DailyTimeRecord;
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

    public function showBiometric(Request $request){
        $date_from = $request->date_from ? Carbon::createFromFormat('m/d/Y',$request->date_from) : Carbon::now();
        $date_to = $request->date_to ? Carbon::createFromFormat('m/d/Y',$request->date_to) : Carbon::now();
        $user_id = $request->user_id ? $request->user_id : '';

        $date1= $date_from->format('m/d/Y');
        $date2 = $date_to->format('m/d/Y');

        $page_title = "Biometric";


        if($request->user_id == '' ){
           $biometrics = DailyTimeRecord::whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
                ->orderBy('production_date')
                ->get();
        }
        else{
            $biometrics = DailyTimeRecord::where('operator_id',$user_id)
                ->whereBetween('time_log',[$date_from->startOfDay(),$date_to->endOfDay()])
                ->orderBy('production_date')
                ->get();
        }

        return view("admin.reports.biometric",compact('page_title','biometrics','date1','date2','user_id'));
    }

}
