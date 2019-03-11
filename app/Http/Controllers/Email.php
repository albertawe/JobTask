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
    $this->validate($request, [
        'email' => 'required|min:5',
        'nama' => 'required',
        'judul' => 'required',
        'pesan' => 'required|min:10',
    ]);
    try{
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
    $job = JobPost::where('payment_id',$id)->first();
    $jobname = $job->title;
    $paymentdetail->paid_status = 'paid pending';
    $invid = $paymentdetail->invoice;
    $uid = Auth::user()->id;
    $user = User::where('id', $uid)->with(['user_skill', 'user_profile'])->first();
    $firstname = $user->user_profile->first_name;
    $lastname = $user->user_profile->last_name;
    $email = $user->email;
    $paymentdetail->save();
    try{
        Mail::send('prosespay', ['job_name' => $jobname, 'first_name' => $firstname, 'last_name' => $lastname ,'invoice' => $invid], function ($message) use ($email)
        {
            $message->subject('pembayaran anda sedang diproses oleh admin!');
            $message->from('jobtaskerindonesia@gmail.com');
            $message->to($email);
        });
    }
    catch (Exception $e){
        return response (['status' => false,'errors' => $e->getMessage()]);
    }
    try{
        Mail::send('prosespayadmin', ['invoice' => $invid], function ($message) use ($email)
        {
            $message->subject('request pengecekan pembayaran!');
            $message->from('jobtaskerindonesia@gmail.com');
            $message->to('jobtaskerindonesia@gmail.com');
        });
        return redirect()->back();
    }
    catch (Exception $e){
        return response (['status' => false,'errors' => $e->getMessage()]);
    }
}
}
