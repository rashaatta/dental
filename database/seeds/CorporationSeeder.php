<?php

use Illuminate\Database\Seeder;

class CorporationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // DB::table('corporation')->delete();
        factory(\App\Corporation::class, 20)->create();
    }
}
