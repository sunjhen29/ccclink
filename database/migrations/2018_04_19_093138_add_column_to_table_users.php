<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('department');
            $table->string('position');
            $table->date('birth_date');
            $table->date('employment_date');
            $table->string('employment_type');
            $table->string('firstname');
            $table->string('lastname');
            $table->binary('user_img');
            $table->string('mobile');
            $table->string('home');
            $table->string('address');
            $table->string('tin');
            $table->string('sss');
            $table->string('philhealth');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('department');
            $table->dropColumn('position');
            $table->dropColumn('birth_date');
            $table->dropColumn('employment_date');
            $table->dropColumn('employment_type');
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('user_img');
            $table->dropColumn('mobile');
            $table->dropColumn('home');
            $table->dropColumn('address');
            $table->dropColumn('tin');
            $table->dropColumn('sss');
            $table->dropColumn('philhealth');
        });
    }
}
