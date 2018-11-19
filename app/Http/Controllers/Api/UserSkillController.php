<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\UserSkill;

class UserSkillController extends Controller
{
    public function getUserSkill($id){
        $user_skill = UserSkill::find($id);
        return $user_skill;
    }

    public function addUserSkill(Request $request){
        $credentials = $request->only('tagline', 'transportation', 'language', 'qualification', 'cv');

        $rules = [
            'tagline' => 'required|max:255',
            'transportation' => 'required|max:255',
            'language' => 'required|max:255',
            'qualification' => 'required|max:255',
            'cv' => 'required|max:255'
        ];
        $validator = Validator::make($credentials, $rules);

        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }

        $user_skill = new UserSkill;

        $user_skill->tagline = $request->tagline;
        $user_skill->transportation = $request->transportation;
        $user_skill->language = $request->language;
        $user_skill->qualification = $request->qualification;
        $user_skill->cv = $request->cv;

        $user_skill->save();

        return response()->json(['success'=> true, 'message'=> 'User skill successfully added.']);
    }

    public function updateUserSkill(Request $request, $id){
        $credentials = $request->only('tagline', 'transportation', 'language', 'qualification', 'cv');

        $rules = [
            'tagline' => 'required|max:255',
            'transportation' => 'required|max:255',
            'language' => 'required|max:255',
            'qualification' => 'required|max:255',
            'cv' => 'required|max:255'
        ];
        $validator = Validator::make($credentials, $rules);

        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }

        $user_skill = UserSkill::find($id);

        $user_skill->tagline = $request->tagline;
        $user_skill->transportation = $request->transportation;
        $user_skill->language = $request->language;
        $user_skill->qualification = $request->qualification;
        $user_skill->cv = $request->cv;

        $user_skill->save();

        return response()->json(['success'=> true, 'message'=> 'User skill successfully updated.']);
    }
}
