<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Leave extends Model
{
    protected $table= "leaves";

    protected $fillable = [
        'user_id','leave_date','leave_code','reason','approver','status'
    ];

    public function getLeaveDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d',$value)->format('m/d/Y');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function approve(){
        return $this->belongsTo('App\User','approver','id');
    }
}
