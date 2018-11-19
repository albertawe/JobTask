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
        $message = message::where('id',$id)->with('conversation.user.user_profile')->first();
        $user = Auth::user()->id;
        $conversations = $message->conversation;
//        dd($message);
//        dd($conversations[0]->cons_id);
        // dd($messages->name1);
        // dd($messages->name2);
        return view('testconversation', compact('conversations'), compact('message'), compact('messageid'));
    }

    public function post_message(Request $request, $id){
        $user = Auth::user()->id;
        $con_id = $id;
        if (!empty($request->content)) {
            $con = new conversation;
            $con->cons_id = $con_id;
            $con->content = $request->content;
            $con->sender_id = $user;
            $con->save();
        }
        return redirect()->back();
    }
}
