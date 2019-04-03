<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class reportmessage extends Model
{
    use CrudTrait;
    protected $fillable = ['ticket','user_id','status','title'];
    protected $table = 'reportmessages';
    public function reportcon(){
        return $this->hasMany('App\reportcon', 'cons_id');
    }
}
