<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class reporttask extends Model
{
    use CrudTrait;
    protected $table = 'reporttasks';
    protected $fillable = ['poster_status','worker_status','report_status','poster_email','worker_email','job_id','poster_id','worker_id'];
}
