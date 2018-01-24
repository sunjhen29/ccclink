<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User_Login;
use Carbon\Carbon;

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
            $user_attendance = User_Login::whereBetween('created_at',[$date_from->startOfDay(),$date_to->endOfDay()])
                ->groupBy('user_id','created_at')->get();
        }
        else{
            $user_attendance = User_Login::where('user_id',$user_id)
                ->whereBetween('created_at',[$date_from->startOfDay(),$date_to->endOfDay()])
                ->groupBy('user_id','created_at')->get();
        }

        return view("admin.reports.login",compact('page_title','user_attendance','date1','date2','user_id'));
    }
}
