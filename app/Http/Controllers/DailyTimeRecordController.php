<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\DailyTimeRecord;
use Carbon\Carbon;



class DailyTimeRecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $leaves = DailyTimeRecord::all();
        //return view('admin.attendance.leave',compact('leaves'));
    }

    public function create(Request $request){

        $log = new DailyTimeRecord();
        $log->operator_id = $request->operator_id;
        $log->time_log = $request->time_in ? Carbon::createFromFormat('m/d/Y',$request->production_date)->format('Y-m-d').' '.$request->time_in.':00' : Carbon::createFromFormat('m/d/Y',$request->production_date)->format('Y-m-d').' '.$request->time_out.':00';
        $log->device_id = 0;
        $log->in_out = $request->time_in ? 1 : 2;
        $log->production_date = Carbon::createFromFormat('m/d/Y',$request->production_date)->format('Y-m-d');
        $log->save();
        $prod_date = Carbon::createFromFormat('Y-m-d',$log->production_date)->format('m/d/Y');
        return redirect('/attendance/timerecord?user_id='.$log->operator_id.'&date_from='.$prod_date.'&date_to='.$prod_date);
    }

    public function show(DailyTimeRecord $dtr){
        return $dtr;
    }

    public function update(Leave $leave, Request $request){
        $request['leave_date'] = Carbon::createFromFormat('m/d/Y',$request->date_from)->format('Y-m-d');
        $leave->update($request->all());
        return redirect('/leave');
    }

    public function approve(Leave $leave){
        $leave->update(['status'=>'Approved']);
        return redirect('/leave');
    }

    public function decline(Leave $leave){
        $leave->update(['status'=>'Declined']);
        return redirect('/leave');
    }


}
