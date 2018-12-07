<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class ListUser extends Model
{
    use CrudTrait;
    protected $table = 'users';
    protected $fillable = ['email','user_type_id'];
}
