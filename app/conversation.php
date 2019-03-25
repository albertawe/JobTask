<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class conversation extends Model
{
    use CrudTrait;
    protected $table = 'conversations';
    protected $fillable = ['cons_id','content','sender_id','created_at'];
    public function message(){
        return $this->belongsTo('App\message', 'cons_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'sender_id');
    }
}
