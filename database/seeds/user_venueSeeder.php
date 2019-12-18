<?php

use Illuminate\Database\Seeder;

class user_venueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_venue')->insert([
            'user_id' => 1,
            'venue_id' => 1,
            'points' => '100'
        ]);
    }
}
