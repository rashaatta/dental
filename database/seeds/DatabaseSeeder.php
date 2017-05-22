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
        //$this->call(CorporationSeeder::class);
//        $this->call(PatientSeeder::class);
        $this->call(StaffSeeder::class);
    }
}
