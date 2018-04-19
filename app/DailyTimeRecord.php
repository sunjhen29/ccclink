<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyTimeRecord extends Model
{

    protected $fillable = [
        'operator_id', 'time_log', 'device_id', 'in_out','production_date'
    ];
}
