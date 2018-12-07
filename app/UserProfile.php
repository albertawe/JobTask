<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class UserProfile extends Model
{
    use CrudTrait;
    protected $table = 'user_profile';
    protected $fillable = ['first_name','last_name','email','bank','no_rek','tagline','location','birthdate'];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
