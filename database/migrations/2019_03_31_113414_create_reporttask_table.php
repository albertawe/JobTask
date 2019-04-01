<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReporttaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporttasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('poster_id');
            $table->integer('worker_id');
            $table->integer('job_id');
            $table->text('poster_message');
            $table->text('worker_message');
            $table->string('poster_image');
            $table->string('worker_image');
            $table->string('poster_status');
            $table->string('worker_status');
            $table->string('report_status');
            $table->string('poster_email');
            $table->string('worker_email');
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
        Schema::dropIfExists('reporttasks');
    }
}
