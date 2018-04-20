<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [
        'department_name', 'department_code'
    ];

    public function users(){
        return $this->hasmany('App\User','department_code','department');
    }
}
