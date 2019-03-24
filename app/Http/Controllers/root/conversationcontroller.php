<?php

namespace App\Http\Controllers\root;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\message;
use App\conversation;
use Auth;
class conversationcontroller extends Controller
{
    public function index($id){
        $user = Auth::user()->id;
        $message = message::where('id',$id)->with('conversation.user.user_profile')->first();
        if (empty($message)){
            return redirect()->back();
        }
        if ($user == $message->user1 || $user == $message->user2){
            $conversations = $message->conversation;
            return view('testconversation', compact('conversations'), compact('message'), compact('messageid'));      
        }
        else {
            return redirect()->back();
        }
    }


    public function post_message(Request $request, $id){
        $uid = Auth::user()->id;
        $user = User::where('id', $uid)->first();
        $con_id = $id;
        if (!empty($request->content)) {
            $con = new conversation;
            $con->cons_id = $con_id;
            if($user->user_type_id == 1){
                $con->role = 'admin';
            }
            else{
                $con->role = 'user';
            }
            $con->content = $request->content;
            $con->sender_id = $user;
            $con->save();
        }
        return redirect()->back();
    }
}
