<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Leave;
use Carbon\Carbon;

class LeaveController extends Controller
{


    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $leaves = Leave::with('user','approve')->get();
        return view('admin.attendance.leave',compact('leaves'));
    }

    public function create(Request $request){
        $request['leave_date'] = Carbon::createFromFormat('m/d/Y',$request->date_from)->format('Y-m-d');
        $request['user_id'] = auth()->guard('admin')->user()->id;
        $request['status'] = 'Pending';
        Leave::create($request->all());
        return redirect('/leave');
    }

    public function show(Leave $leave){
        return $leave;
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
