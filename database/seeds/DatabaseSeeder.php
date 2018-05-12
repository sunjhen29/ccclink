<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AdminsTableSeeder::class);
         $this->call(LeaveTypesTableSeeder::class);
         $this->call(DepartmentTableSeeder::class);
         $this->call(UserTableSeeder::class);
        $this->call(ActivityLookupSeeder::class);
    }
}
