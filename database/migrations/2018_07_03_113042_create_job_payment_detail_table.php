<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPaymentDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_payment_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment_id');
            //$table->foreign('payment_id')->references('payment_id')->on('job_post');
            $table->string('paid_status')->default('not paid');
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
        Schema::dropIfExists('job_payment_detail');
    }
}
