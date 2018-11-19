<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class JobPost extends Model
{
    use CrudTrait;
    protected $fillable = ['payment_id','posted_by_id','assigned_tasker_id','title','job_type','job_category','status','due_date','price','address','job_description'];
    protected $table = 'job_post';
    // public function jobdetail(){
    //     return $this->hasMany('PaymentDetail');
    // }
}
