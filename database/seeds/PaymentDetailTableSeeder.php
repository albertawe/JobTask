<?php

use Illuminate\Database\Seeder;

class PaymentDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_payment_detail')->insert([
            'payment_id' => 'P-0000001',
            'paid_status' => 'paid'
        ]);
    }
}
