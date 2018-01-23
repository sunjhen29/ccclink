<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Task;
use Carbon\Carbon;


class TaskController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->user = User::find(auth()->user()->id);

    }

    public function store(Request $request){
        $this->user->tasks()->create($request->all());
        return redirect()->back();
    }

    public function update(Request $request, Task $task){
        $task->update(['active'=>false,'finished_at'=>Carbon::now()]);
        return redirect()->back();
    }
}
