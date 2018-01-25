<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = ['task_name','active','finished_at','production_date'];

    protected $dates = ['finished_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
