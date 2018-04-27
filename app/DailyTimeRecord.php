<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyTimeRecord extends Model
{
    protected $tables = 'daily_time_records';

    protected $dates = [
        'time_logs'
    ];
    protected $fillable = [
        'operator_id', 'time_log', 'device_id', 'in_out','production_date'
    ];
}
