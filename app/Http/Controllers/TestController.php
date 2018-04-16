<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Att_Punches;


class TestController extends Controller
{
    public function sqlserver(){

        return Att_Punches::all();

        return "hi";
    }
}
