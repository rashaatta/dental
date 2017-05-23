<?php

use Illuminate\Database\Seeder;

class StaffWorkDaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //DB::table('staff')->delete();
        factory(\App\StaffWorkDays::class, 100)->create();
    }
}
