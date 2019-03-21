<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment_id')->unique();
            $table->string('posted_by_id');
            $table->string('title');
            $table->string('job_type');
            $table->string('job_category');
            $table->string('status')->default('not assigned');
            $table->string('assigned_tasker_id')->nullable();
            $table->string('due_date');
            $table->integer('price');
            $table->string('address');
            $table->longText('job_description');
            $table->integer('message_id');
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
        Schema::dropIfExists('job_post');
    }
}
