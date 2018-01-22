<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;


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
}
