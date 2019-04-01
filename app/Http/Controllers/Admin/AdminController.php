<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\creditlog;

class AdminController extends Controller
{
    public function showimage($id){
    $credit = creditlog::where('id',$id)->first();
    $filepath = '/images'.$credit->image;    
    return view('afterlogin.showimage',compact('filepath'));
    }
}
