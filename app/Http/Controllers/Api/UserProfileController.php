<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserProfile;
use Validator;
use Carbon\Carbon;
class UserProfileController extends Controller
{
    public function getUserProfile($id){
        $user_profile = UserProfile::find($id);
        return $user_profile;
    }

    public function addUserProfile(Request $request){
        $credentials = $request->only('first_name', 'last_name', 'tagline', 'email', 'birthdate', 'location');

        $rules = [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'tagline' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'birthdate' => 'required',
            'location' => 'required|max:255'
        ];
        $validator = Validator::make($credentials, $rules);

        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }

        $user_profile = new UserProfile;

        $user_profile->first_name = $request->first_name;
        $user_profile->last_name = $request->last_name;
        $user_profile->tagline = $request->tagline;
        $user_profile->email = $request->email;
        //$user_profile->birthdate = $request->birthdate;
        $user_profile->birthdate = date("Y-m-d", strtotime($request->birthdate));
        dd($user_profile->birthdate);
        $user_profile->location = $request->location;

        $user_profile->save();

        return response()->json(['success'=> true, 'message'=> 'User profile successfully added.']);
    }

    public function updateUserProfile(Request $request, $id){
        $credentials = $request->only('first_name', 'last_name', 'tagline', 'email', 'birthdate', 'location');

        $rules = [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'tagline' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'birthdate' => 'required',
            'location' => 'required|max:255'
        ];
        $validator = Validator::make($credentials, $rules);

        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }

        $user_profile = UserProfile::find($id);

        $user_profile->first_name = $request->first_name;
        $user_profile->last_name = $request->last_name;
        $user_profile->tagline = $request->tagline;
        $user_profile->email = $request->email;
        $user_profile->birthdate = $request->birthdate;
        $user_profile->location = $request->location;

        $user_profile->save();

        return response()->json(['success'=> true, 'message'=> 'User profile successfully updated.']);
    }
}
