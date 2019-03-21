<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditUsersLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditlogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status')->nullable();
            $table->integer('nominal')->nullable();
            $table->string('reason')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('payment_id')->nullable();
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
        Schema::table('creditlogs', function (Blueprint $table) {
            //
        });
    }
}
