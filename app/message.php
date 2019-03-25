<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class message extends Model
{
    use CrudTrait;
    protected $table = 'messages';
    protected $fillable = ['user1','user2','name1','name2','status','job_id'];
    public function conversation(){
        return $this->hasMany('App\conversation', 'cons_id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function jobpost(){
        return $this->belongsTo('App\jobpost','job_id');
    }
}
