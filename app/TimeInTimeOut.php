<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeInTimeOut extends Model
{
    protected $table = 'timeinouts';

    protected $fillable = ['employee_no','employee_name','work_date','day','in1','in2','out1','out2','next_day','hours_work',];
}
