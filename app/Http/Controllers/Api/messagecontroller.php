<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\message;
use App\UserProfile;
use Auth;
use App\User;
use DB;
use App\conversation;

class messagecontroller extends Controller
{
    public function get($id)
    {
        $message = message::where('id',$id)->with('conversation.user.user_profile')->first();
        $conversations = $message->conversation;
        return $conversations;
    }

    public function post_message(Request $request, $id){
        $con_id = $id;
        if (!empty($request->content)) {
            $con = new conversation;
            $con->cons_id = $con_id;
            $con->content = $request->content;
            $con->sender_id = $request->uid;
            $con->save();
        }
        return response()->json(['success'=> true, 'message'=> 'Message successfully sent']);
    }
}
