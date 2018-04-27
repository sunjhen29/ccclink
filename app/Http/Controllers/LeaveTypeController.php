<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\LeaveType;

class LeaveTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $leave_types = LeaveType::all();
        return view('admin.attendance.leave_type',compact('leave_types'));
    }

    public function create(Request $request){
        LeaveType::create($request->all());
        return redirect('/leave_type');
    }

    public function show(LeaveType $leave_type){
        return $leave_type;
    }

    public function update(LeaveType $leave_type, Request $request){
        $leave_type->update($request->all());
        return redirect('/leave_type');
    }
}
