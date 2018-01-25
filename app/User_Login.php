<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Login extends Model
{
    protected $table = "user_logins";

    protected $fillable = ['user_id','ip_address','computer_name','event','user_type','production_date'];

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

}
