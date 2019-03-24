<?php

namespace App\Http\Controllers\root;

use Illuminate\Http\Request;
use App\reportmessage;
use App\reportcon;
use Auth;
use Mail;
use App\User;
use App\Http\Controllers\Controller;

class reportmessagecontroller extends Controller
{
    public function indexuser(){
        $uid = Auth::user()->id;
        $messages = reportmessage::where([
            ['user_id','=',$uid],
            ['status','=','active']
        ])->get();
        return view('afterlogin.reportmessage',compact('messages'));
    }

    public function generate(){
        $uid = Auth::user()->id;
        $message = new reportmessage;
        $ticket = sprintf('T-%07d', reportmessage::orderBy('id', 'desc')->first()->id + 1);
        $message->ticket = $ticket;
        $message->user_id = $uid;
        $message->status = 'active';
        $user = User::where('id', $uid)->first();
        $email = $user->email;
        $message->save();
        try{
            Mail::send('ticketuser', ['ticket' => $ticket], function ($message) use ($email)
            {
                $message->subject('chatroom pelaporan telah dibuka');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to($email);
            });
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
        try{
            Mail::send('ticketadmin', ['ticket' => $ticket], function ($message)
            {
                $message->subject('chatroom pelaporan baru telah dibuka');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to('jobtaskerindonesia@gmail.com');
            });
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
        return back()->with('alert-success','Request pembukaan chatroom pelaporan berhasil dibuka');
    }
    public function post_message(Request $request, $id){
        $uid = Auth::user()->id;
        $user = User::where('id', $uid)->first();
        $con_id = $id;
        if (!empty($request->content)) {
            $con = new reportcon;
            $con->cons_id = $con_id;
            if($user->user_type_id == 1){
                $con->role = 'admin';
            }
            else{
                $con->role = 'user';
            }
            $con->content = $request->content;
            $con->sender_id = $uid;
            $con->save();
        }
        return redirect()->back();
    }
    public function getcons($id)
    {
        $uid = Auth::user()->id;
        $message = reportmessage::where('id',$id)->with('reportcon')->first();
        if($message->user_id != $uid){
            return redirect()->back();
        }
        $conversations = $message->reportcon;
        return view('afterlogin.reportcons',compact('conversations','message'));
    }
    public function openchatadmin($id) 
    {
        $message = reportmessage::where('id',$id)->with(['reportcon'])->first();
        $uid = $message->user_id;
        $users = User::where('id', $uid)->first();
        $email = $users->email;
        $ticket = $message->ticket;
        $conversations = $message->reportcon;
        if($message->status == 'active'){
            $message->status = 'process';
            $message->save();
        try{
            Mail::send('reportadmin',['ticket' => $ticket], function ($message) use ($email)
            {
                $message->subject('admin telah siap untuk melayani anda');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to($email);
            });
            return view('afterlogin.reportconsadmin',compact('conversations','message'));
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
        }
        else {
            return view('afterlogin.reportconsadmin',compact('conversations','message'));
        }
    }
}
