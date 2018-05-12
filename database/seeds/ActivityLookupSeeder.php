<?php

use Illuminate\Database\Seeder;

class ActivityLookupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $leave_type = new \App\ActivityLookup();
        $leave_type->code = 'DE';
        $leave_type->description = 'Data Entry';
        $leave_type->save();

        $leave_type = new \App\ActivityLookup();
        $leave_type->code = 'CB';
        $leave_type->description = 'Coffee Break';
        $leave_type->save();
    }
}
