<?php

use Illuminate\Database\Seeder;

class LeaveTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $leave_type = new \App\LeaveType();
        $leave_type->leave_code = 'VL';
        $leave_type->leave_description = 'Vacation Leave';
        $leave_type->save();

        $leave_type = new \App\LeaveType();
        $leave_type->leave_code = 'SL';
        $leave_type->leave_description = 'Sick Leave';
        $leave_type->save();

        $leave_type = new \App\LeaveType();
        $leave_type->leave_code = 'ML';
        $leave_type->leave_description = 'Maternity Leave';
        $leave_type->save();

        $leave_type = new \App\LeaveType();
        $leave_type->leave_code = 'BL';
        $leave_type->leave_description = 'Birthday Leave';
        $leave_type->save();

        $leave_type = new \App\LeaveType();
        $leave_type->leave_code = 'PL';
        $leave_type->leave_description = 'Paternity Leave';
        $leave_type->save();

        $leave_type = new \App\LeaveType();
        $leave_type->leave_code = 'SIL';
        $leave_type->leave_description = 'Service Incentive Leave';
        $leave_type->save();

        $leave_type = new \App\LeaveType();
        $leave_type->leave_code = 'SPL';
        $leave_type->leave_description = 'Single Parent Leave';
        $leave_type->save();

    }

}
