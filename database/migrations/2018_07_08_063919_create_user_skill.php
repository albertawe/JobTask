<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSkill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_skill', function (Blueprint $table) {
            $table->increments('id');
            $table->text('tagline')->nullable();
            $table->string('transportation')->nullable();
            $table->string('language')->nullable();
            $table->string('qualification')->nullable();
            $table->string('workexperience')->nullable();
            $table->string('cv')->nullable()->default('nothinga.jpg');
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_skill');
    }
}
