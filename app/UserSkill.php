<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    protected $table = 'user_skill';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
