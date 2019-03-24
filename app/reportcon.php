<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reportcon extends Model
{
    public function reportmessage(){
        return $this->belongsTo('App\reportmessage', 'cons_id');
    }
}
