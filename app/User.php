<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','employee_no','user_type','department','position','firstname','lastname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user_logins(){
        return $this->hasMany('App\User_Login');
    }

    public function tasks(){
        return $this->hasMany('App\Task');
    }

    public function setPasswordAttribute($value){
        $value != '' ? $this->attributes['password'] = bcrypt($value) : $this->attributes['password'] = null;
    }

    public function dept(){
        return $this->belongsTo('App\Department','department','department_code');
    }

    public function leaves(){
        return $this->hasMany('App\Leave');
    }

    public function getfullnameAttribute(){
        return $this->attributes['lastname'].", ".$this->attributes['firstname'];
    }


}
