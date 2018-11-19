<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class jobcategory extends Model
{
    use CrudTrait;
    protected $table = 'jobcategories';
    protected $fillable = ['category'];
    public $timestamps = true;
}
