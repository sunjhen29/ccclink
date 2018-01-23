<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User_Login;

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
        if(\Auth::guard('admin')->check()){

        } else {
            $user_login = new User_Login();
            $user_login->event = 'logout';
            $user_login->user_id = $event->user->id;
            $user_login->save();
        }

    }
}
