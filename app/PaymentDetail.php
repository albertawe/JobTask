<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class PaymentDetail extends Model
{
    use CrudTrait;
    protected $table = 'job_payment_detail';
    protected $fillable = ['payment_id','paid_status'];
    public function JobPost()
    {
        return $this->belongsTo('JobPost');
    }
}
