<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User_Login;
use Carbon\Carbon;
use Mail;

class EmailController extends Controller
{
    public function emailLogin(Request $request){
        $email = $request->email;
        $headcount = User_Login::where('user_type','user')->where('production_date','=',Carbon::today()->toDateString())->groupBy('user_id')->get();

        Mail::send(['html'=>'mail.dtr'],
            ['data'=>$headcount],
            function($message) use ($email){
                $message->to($email,'CCC Data Management Services Inc.')
                    ->subject('Headcount '.Carbon::today()->toDateString());
            });
        return $email.' successfully sent.';
    }
}
