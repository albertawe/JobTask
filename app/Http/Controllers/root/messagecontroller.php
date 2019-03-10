<?php

namespace App\Http\Controllers\root;
use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\message;
use App\UserProfile;
use Auth;
use App\User;
use DB;
class messagecontroller extends Controller
{
    public function create($id){
        $user1 = Auth::user()->id;
        $user2 = $id;
        $check = DB::select("SELECT user1, user2 FROM tasker.messages WHERE 
                ('" . $user1 . "' IN (user1) AND '" . $user2 . "' IN (user2)) 
                OR ('" .$user1 . "' IN (user2) AND '" . $user2 . "' IN(user1));");

        if(empty($check)){
            $message = new message;
            $message->user1 = $user1;
            $message->user2 = $user2;
            $message->save();
            $user = User::where('id', $user1)->with(['user_profile'])->first();
            $userr = User::where('id', $user2)->with(['user_profile'])->first();
            $firstname = $user->user_profile->first_name;
            $email = $userr->email;
            try{
                Mail::send('openchatmail', ['nama' => $firstname], function ($messages) use ($email)
                {
                    $messages->subject('your possible tasker has opened a chatroom with you');
                    $messages->from('jobtaskerindonesia@gmail.com');
                    $messages->to($email);
                });
                return redirect('/message');
            }
            catch (Exception $e){
                return response (['status' => false,'errors' => $e->getMessage()]);
            }   
        } else {
            return redirect('/message');
        }
    }
    public function index()
    {
        $id = Auth::user()->id;
        $messages = DB::select("SELECT messages.id as message_id, up1.first_name as user1_first_name, up1.last_name as user1_last_name, 
                                up2.first_name as user2_first_name, up2.last_name as user2_last_name 
                                FROM messages LEFT JOIN users u1 ON messages.user1 = u1.id 
                                LEFT JOIN users u2 ON messages.user2 = u2.id LEFT JOIN user_profile up1
                                ON u1.id = up1.user_id LEFT JOIN user_profile up2 ON u2.id = up2.user_id WHERE u1.id='" . $id . "' or u2.id='" . $id . "';");
        return view('afterlogin.message',compact('messages','id'));
    }
}
