<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use App\PaymentDetail;
use App\user;
use App\JobPost;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class Email extends Controller
{
    public function sendEmail(Request $request)
{
    try{
        // Mail::send('email', ['nama' => $request->nama, 'pesan' => $request->pesan], function ($message) use ($request)
        // {
        //     $message->subject($request->judul);
        //     $message->from('s00000017107@student.uph.edu', $request->nama);
        //     $message->to('jobtaskerindonesia@gmail.com');
        // });
        Mail::send('email', ['nama' => $request->nama, 'pesan' => $request->pesan], function ($message) use ($request)
        {
            $message->subject($request->judul);
            $message->from('jobtaskerindonesia@gmail.com');
            $message->to($request->email);
        });
        return back()->with('alert-success','Berhasil Kirim Email');
    }
    catch (Exception $e){
        return response (['status' => false,'errors' => $e->getMessage()]);
    }
}
public function sendInvoice($id)
{
    $paymentdetail = PaymentDetail::where('payment_id',$id)->first();
    // $jobpost = JobPost::where('payment_id',$id)->first();
    // $jobpost->status = 'not assigned';
    $paymentdetail->paid_status = 'paid pending';
    $uid = Auth::user()->id;
    $user = User::where('id', $uid)->with(['user_skill', 'user_profile'])->first();
    $firstname = $user->user_profile->first_name;
    $lastname = $user->user_profile->last_name;
    $email = $user->email;
    // $jobpost->save();
    $paymentdetail->save();
    try{
        Mail::send('invoice', ['first_name' => $firstname, 'last_name' => $lastname ,'invoice' => $id], function ($message) use ($email)
        {
            $message->subject('pembayaran anda telah diterima!');
            $message->from('jobtaskerindonesia@gmail.com');
            $message->to($email);
        });
        return redirect()->back();
    }
    catch (Exception $e){
        return response (['status' => false,'errors' => $e->getMessage()]);
    }
}
}
