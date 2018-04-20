<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Department;


class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $page_title = "Manage Department";
        $departments = Department::all();
        return view('admin.user.department',compact('page_title','departments'));
    }

    public function create(Request $request){
        Department::create($request->all());
        return redirect('/department');
    }

    public function showDepartment(Department $dept){
        return $dept;
    }

    public function update(Department $dept, Request $request){
        $dept->update($request->all());
        return redirect('/department');
    }
}
