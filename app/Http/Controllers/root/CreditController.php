<?php

namespace App\Http\Controllers\root;
use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\creditlog;
use App\PaymentDetail;
use App\User;
use Illuminate\Support\Facades\Auth;

class CreditController extends Controller
{
    public function indextopup(){
        return view('afterlogin.topup');
    }

    public function indexwithdraw(){
        $uid = Auth::user()->id;
        $user = User::where('id', $uid)->with(['credit'])->first();
        $max = $user->credit->credit;
        return view('afterlogin.withdraw',compact('max'));
    }

    public function topup(Request $request){
        $this->validate($request, [
            'price' => 'required'
        ]);
        $credit = new creditlog;
        $payment = new PaymentDetail;
        $payment_id = sprintf('TP-%07d', creditlog::orderBy('id', 'desc')->first()->id + 1);
        $invoice = sprintf('INV-%07d', PaymentDetail::orderBy('id', 'desc')->first()->id + 1);
        $nominal = $request->price;
        $credit->status = 'topup';
        $credit->nominal = $nominal;
        $credit->reason = 'request topup';
        $credit->payment_id = $payment_id;
        $payment->payment_id = $payment_id;
        $payment->invoice = $invoice;
        $payment->paid_status = 'topup pending';
        $credit->save();
        $payment->save();
        $uid = Auth::user()->id;
        $user = User::where('id', $uid)->with(['user_profile'])->first();
        $firstname = $user->user_profile->first_name;
        $lastname = $user->user_profile->last_name;
        $email = $user->email;
        try{
            Mail::send('prosespay', ['first_name' => $firstname, 'last_name' => $lastname ,'invoice' => $invoice, 'nominal' => $nominal], function ($message) use ($email)
            {
                $message->subject('silahkan melakukan pembayaran atas request topup anda');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to($email);
            });
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
        return back()->with('alert-success','Request topup telah berhasil diajukan, segera cek email anda proses selanjutnya');
    }

    public function withdraw(Request $request){
        $this->validate($request, [
            'price' => 'required'
        ]);
        $credit = new creditlog;
        $payment = new PaymentDetail;
        $payment_id = sprintf('WD-%07d', creditlog::orderBy('id', 'desc')->first()->id + 1);
        $invoice = sprintf('INV-%07d', PaymentDetail::orderBy('id', 'desc')->first()->id + 1);
        $nominal = $request->price;
        $credit->status = 'withdraw';
        $credit->nominal = $nominal;
        $credit->reason = 'request withdraw';
        $credit->payment_id = $payment_id;
        $payment->payment_id = $payment_id;
        $payment->invoice = $invoice;
        $payment->paid_status = 'withdraw pending';
        $credit->save();
        $payment->save();
        $uid = Auth::user()->id;
        $user = User::where('id', $uid)->with(['user_profile'])->first();
        $firstname = $user->user_profile->first_name;
        $lastname = $user->user_profile->last_name;
        $email = $user->email;
        try{
            Mail::send('prosespaywithdraw', ['first_name' => $firstname, 'last_name' => $lastname ,'invoice' => $invoice, 'nominal' => $nominal], function ($message) use ($email)
            {
                $message->subject('request withdrawal anda sedang kami proses');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to($email);
            });
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
        return back()->with('alert-success','Request withdraw telah berhasil diajukan, silahkan cek email anda');
    }

    public function confirmation($id){
        $uid = Auth::user()->id;
        $payment = PaymentDetail::where('payment_id',$id)->first();
        $invoice = $payment->invoice;
        $user = User::where('id', $uid)->with(['user_profile'])->first();
        $firstname = $user->user_profile->first_name;
        $lastname = $user->user_profile->last_name;
        $email = $user->email;
        try{
            Mail::send('konfirmasi', ['first_name' => $firstname, 'last_name' => $lastname ,'invoice' => $invoice], function ($message) use ($email)
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
            Mail::send('prosespayadmin', ['invoice' => $invoice], function ($message)
            {
                $message->subject('request pengecekan pembayaran');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to('jobtaskerindonesia@gmail.com');
            });
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
        return back()->with('alert-success','konfirmasi pembayaran anda telah kami terima');
    }
}
