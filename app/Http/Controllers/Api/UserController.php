<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Validator;
class UserController extends Controller
{
    public function getAllUsers(){
        $users = User::get();
        return $users;
    }

    public function getUser($userId){
        $user = User::find($userId);
        return $user;
    }

    public function addUser(Request $request){
        $credentials = $request->only('user_type_id', 'email', 'password');

        $rules = [
            'user_type_id' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|max:255'
        ];
        $validator = Validator::make($credentials, $rules);

        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }

        $user = new User;

        $user->user_type_id = $request->user_type_id;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return response()->json(['success'=> true, 'message'=> 'User successfully added.']);
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return response()->json(['success'=> true, 'message'=> 'User deleted successfully.']);
    }
}
