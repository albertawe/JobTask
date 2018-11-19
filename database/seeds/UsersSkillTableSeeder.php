<?php

use Illuminate\Database\Seeder;

class UsersSkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_skill')->insert([
            'tagline' => str_random(10),
            'transportation' => str_random(10),
            'language' => str_random(10),
            'qualification' => str_random(10),
            'workexperience' => str_random(10)
        ]);
    }
}
