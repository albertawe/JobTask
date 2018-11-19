<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_profile')->insert([
            'first_name' => str_random(10),
            'last_name' => str_random(10),
            'tagline' => str_random(10),
            'email' => str_random(10),
            'birthdate' => Carbon::create('2000', '01', '01'),
            'location' => str_random(10)
        ]);
    }
}
