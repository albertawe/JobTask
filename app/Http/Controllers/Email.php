<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;

class Email extends Controller
{
    public function sendEmail(Request $request)
{
    try{
        Mail::send('email', ['nama' => $request->nama, 'pesan' => $request->pesan], function ($message) use ($request)
        {
            $message->subject($request->judul);
            $message->from('s00000017107@student.uph.edu', $request->nama);
            $message->to('jobtaskerindonesia@gmail.com');
        });
        return back()->with('alert-success','Berhasil Kirim Email');
    }
    catch (Exception $e){
        return response (['status' => false,'errors' => $e->getMessage()]);
    }
}
}
