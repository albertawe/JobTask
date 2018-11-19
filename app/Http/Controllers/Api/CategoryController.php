<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\jobcategory;

class CategoryController extends Controller
{
    public function getCategory(){
        $category = jobcategory::get();
        return $category;
    }
}
