<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile', function (Blueprint $table) {
        $table->increments('id');
        $table->string('image')->nullable()->default('nothinga.jpg');
        $table->string('first_name')->nullable();
        $table->string('last_name')->nullable();
        $table->string('bank')->nullable();
        $table->string('no_rek')->nullable();
        $table->text('tagline')->nullable();
        $table->string('email')->nullable();
        $table->date('birthdate')->nullable();
        $table->string('location')->nullable();
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
        Schema::dropIfExists('user_profile');
    }
}
