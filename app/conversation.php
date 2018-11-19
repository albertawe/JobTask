<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class conversation extends Model
{
    public function message(){
        return $this->belongsTo('App\message', 'cons_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'sender_id');
    }
}
