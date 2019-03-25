<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class reportcon extends Model
{
    use CrudTrait;
    protected $table = 'reportcons';
    protected $fillable = ['cons_id','content','sender_id','created_at','role'];
    public function reportmessage(){
        return $this->belongsTo('App\reportmessage', 'cons_id');
    }
}
