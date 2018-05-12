<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'department_name' => 'Information Technology',
            'department_code' => 'IT'
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Human Resources',
            'department_code' => 'HR'
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Administration',
            'department_code' => 'AD'
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Accounting',
            'department_code' => 'ACC'
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Production',
            'department_code' => 'PR'
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Graphics',
            'department_code' => 'GR'
        ]);

        DB::table('departments')->insert([
            'department_name' => 'The Message Centre',
            'department_code' => 'TMC'
        ]);

    }
}
