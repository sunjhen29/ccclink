<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeinoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TimeInOuts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_no')->unsigned();
            $table->string('employee_name');
            $table->date('work_date');
            $table->string('day');
            $table->time('in1')->nullable();
            $table->time('out1')->nullable();
            $table->time('in2')->nullable();
            $table->time('out2')->nullable();
            $table->string('next_day');
            $table->double('hours_work',15,8);
            $table->string('Remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TimeInOuts');
    }
}
