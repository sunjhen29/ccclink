<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@cccdms.com',
            'password' => bcrypt('admin'),
            'username' => 'admin',
            'employee_no' => '999',
            'user_type' => 'admin',
            'created_at' => date_now(),
            'updated_at' => date_now()
        ]);

        DB::table('admins')->insert([
            'name' => 'sunjhen29',
            'email' => 'sunjhen29@yahoo.com',
            'password' => bcrypt('forever'),
            'username' => 'sunjhen29',
            'employee_no' => '998',
            'user_type' => 'superadmin',
            'created_at' => date_now(),
            'updated_at' => date_now()
        ]);

    }
}
