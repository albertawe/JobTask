<?php

namespace App\Http\Controllers\root;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Redirect;
class changepasscontroller extends Controller
{
    public function changepass(Request $request){
        $id = Auth::user()->id;
        $user = User::find($id);
        if(Hash::check($request->prevpassword, $user->password)) {
            $newpassword = Hash::make($request->password);
            $user->password = $newpassword;
            $user->save();
            return redirect('dashboard');
        }
        else {
            //$salah = 'password sebelumnya tidak sesuai';
            return Redirect::back()->withErrors(['password sebelumnya tidak sesuai', 'password sebelumnya tidak sesuai']);
        }
    }
}
