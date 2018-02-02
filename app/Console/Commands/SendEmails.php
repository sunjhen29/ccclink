<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User_Login;
use Carbon\Carbon;
use Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will auto email the attendance log';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $headcount = User_Login::where('user_type','user')->where('production_date','=',Carbon::today()->toDateString())->groupBy('user_id')->get();

        Mail::send(['html'=>'mail.headcount'],
                    ['data'=>$headcount],
                    function($message){
                        $message->to('mijaeya@gmail.com','Sunday Doctolero')
                                ->subject('Sample Email');
                    });
    }
}
