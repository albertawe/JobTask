<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
class blog extends Model
{
    use CrudTrait;
    protected $table = 'blogs';
    protected $fillable = ['berita'];
    public $timestamps = true;
}
