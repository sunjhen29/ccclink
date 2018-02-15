<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User_Login;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user_login = new User_Login();
        $user_login->user_id = $event->user->id;
        $user_login->event = 'login';
        //$user_login->ip_address = $event->ip;
        $user_login->user_type = $event->user->user_type;
        $user_login->production_date = Carbon::now();
        $user_login->save();
    }
}
