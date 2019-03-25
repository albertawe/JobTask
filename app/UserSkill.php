<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class UserSkill extends Model
{
    use CrudTrait;
    protected $table = 'user_skill';
    protected $fillable = ['user_id','transportation','language','qualification','workexperience','images','cv','tagline'];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
