<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    public function conversation(){
        return $this->hasMany('App\conversation', 'cons_id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function jobpost(){
        return $this->hasOne('App\jobpost');
    }
}
