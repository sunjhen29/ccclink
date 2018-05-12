<?php

namespace App\Listeners;

use App\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User_Login;
use Carbon\Carbon;

class LogSuccessfulLogout
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
    public function handle(Logout $event)
    {

            $user_login = new User_Login();
            $user_login->event = 'logout';
            $user_login->user_id = $event->user->id;
            $user_login->production_date = Carbon::now();
            $user_login->user_type = $event->user->user_type;
            //$user_login->ip_address = $event->ip;
            $user_login->save();


            //$update_timeout = User_Login::where('user_id',$event->user->id)
            //    ->where('user_type','user')
            //    ->where('production_date',Carbon::now()->toDateString())->first();
            //$update_timeout->update(['computer_name'=>Carbon::now()]);

    }
}
