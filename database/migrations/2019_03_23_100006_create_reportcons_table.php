<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportcons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cons_id')->default('1')->unsigned();
            $table->index('cons_id');
            $table->integer('sender_id');
            $table->foreign('cons_id')->references('id')->on('reportmessages');
            $table->longText('content')->nullable();
            $table->string('role');
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
        Schema::dropIfExists('reportcons');
    }
}
