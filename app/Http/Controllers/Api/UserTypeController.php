<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserType;
use Validator;

class UserTypeController extends Controller
{
    public function getAllUserType(){
        $userType = UserType::get();

        return $userType;
    }

    public function getUserType($id){
        $userType = UserType::find($id);

        return $userType;
    }

    public function addUserType(Request $request){
        $credentials = $request->only('user_type');

        $rules = [
            'user_type' => 'required|max:255'
        ];
        $validator = Validator::make($credentials, $rules);

        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }

        $userType = new UserType;

        $userType->user_type = $request->user_type;

        $userType->save();

        return response()->json(['success'=> true, 'message'=> 'User type successfully added.']);
    }

    public function updateUserType(Request $request, $id){
        $credentials = $request->only('user_type');

        $rules = [
            'user_type' => 'required|max:255'
        ];
        $validator = Validator::make($credentials, $rules);

        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }

        $userType = UserType::find($id);

        $userType->user_type = $request->user_type;

        $userType->save();

        return response()->json(['success'=> true, 'message'=> 'User type successfully updated.']);
    }

    public function deleteUserType($id){
        $userType = UserType::find($id);
        $userType->delete();
        return response()->json(['success'=> true, 'message'=> 'User type deleted successfully.']);
    }
}
