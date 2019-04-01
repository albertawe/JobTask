<?php

namespace App\Http\Controllers\root;
use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\creditlog;
use App\PaymentDetail;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CreditController extends Controller
{
    public function indextopup(){
        return view('afterlogin.topup');
    }

    public function receiveless(Request $request, $id){
        $this->validate($request, [
            'price' => 'required'
        ]);
        $credits = creditlog::where('id',$id)->first();
        $uid = $credits->user_id;
        $user = User::where('id', $uid)->with(['user_profile'])->first();
        $credit = new creditlog;
        $payment = new PaymentDetail;
        $nominal = $request->price;
        $invoice = sprintf('INV-%07d', PaymentDetail::orderBy('id', 'desc')->first()->id + 1);
        $credit->status = 'topup revision';
        $credit->user_id = $uid;
        $credit->nominal = $nominal;
        $credit->reason = 'paid less than requested';
        $credit->payment_id = $credits->payment_id;
        $payment->payment_id = $credits->payment_id;
        $payment->invoice = $invoice;
        $payment->paid_status = 'topup pending';
        $credit->save();
        $payment->save();
        $firstname = $user->user_profile->first_name;
        $lastname = $user->user_profile->last_name;
        $email = $user->email;
        try{
            Mail::send('prosespayrevision', ['first_name' => $firstname, 'last_name' => $lastname ,'invoice' => $payment_id, 'nominal' => $nominal], function ($message) use ($email)
            {
                $message->subject('silahkan melakukan pembayaran atas request topup anda');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to($email);
            });
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
        return redirect()->back();
    }

    public function receivemore($id){
        $this->validate($request, [
            'price' => 'required'
        ]);
        $credits = creditlog::where('id',$id)->first();
        $pid = $credits->payment_id;
        $uid = $credits->user_id;
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $paymentdetail = PaymentDetail::where('payment_id',$pid)->first();
        $paymentdetail->paid_status = 'paid';
        $paymentdetail->save();
        $credits->status = 'topup completed';
        $credits->completed_at = $now;
        $user = User::where('id', $uid)->with(['user_profile','credit'])->first();
        $credit = new creditlog;
        $payment = new PaymentDetail;
        $nominal = $request->price;
        $invoice = sprintf('INV-%07d', PaymentDetail::orderBy('id', 'desc')->first()->id + 1);
        $credit->status = 'topup more';
        $credit->user_id = $uid;
        $credit->nominal = $nominal;
        $credit->reason = 'paid more than requested';
        $credit->confirmation_at = $now;
        $credit->completed_at = $now;
        $credit->payment_id = $credits->payment_id;
        $payment->payment_id = $credits->payment_id;
        $payment->invoice = $invoice;
        $payment->paid_status = 'paid';
        $user->credit->credit = $user->credit->credit + $credits->nominal + $nominal;
        $user->credit->save();
        $credits->save();
        $credit->save();
        $payment->save();
        return redirect()->back();
    }

    public function indexreceiveless($id){
        return view('afterlogin.receiveless',compact('id'));
    }

    public function indexreceivemore($id){
        return view('afterlogin.receivemore',compact('id'));
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
        $uid = Auth::user()->id;
        $user = User::where('id', $uid)->with(['user_profile'])->first();
        $nominal = $request->price;
        if (creditlog::where([
            ['OwnerName','=',$user->user_profile->transfer_name],
            ['status','=','topup'],
            ['nominal','=',$request->price]
        ])->exists()) {
            $credits = creditlog::where([
                ['OwnerName','=',$user->user_profile->transfer_name],
                ['status','=','topup'],
                ['nominal','=',$request->price]
            ])->orderBy('created_at', 'desc')->first();
            $nominal = $credits->nominal + 1;
        }
        $credit = new creditlog;
        $payment = new PaymentDetail;
        $payment_id = sprintf('TP-%07d', PaymentDetail::orderBy('id', 'desc')->first()->id + 1);
        $invoice = sprintf('INV-%07d', PaymentDetail::orderBy('id', 'desc')->first()->id + 1);
        $credit->status = 'topup';
        $credit->user_id = $uid;
        $credit->nominal = $nominal;
        $credit->reason = 'request topup';
        $credit->payment_id = $payment_id;
        $payment->payment_id = $payment_id;
        $payment->invoice = $invoice;
        $payment->paid_status = 'topup pending';
        $credit->save();
        $payment->save();
        $firstname = $user->user_profile->first_name;
        $lastname = $user->user_profile->last_name;
        $email = $user->email;
        try{
            Mail::send('prosespay', ['first_name' => $firstname, 'last_name' => $lastname ,'invoice' => $payment_id, 'nominal' => $nominal], function ($message) use ($email)
            {
                $message->subject('silahkan melakukan pembayaran atas request topup anda');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to($email);
            });
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
        return back()->with('alert-success','Request topup telah berhasil diajukan, segera cek email anda untuk proses selanjutnya');
    }

    public function withdraw(Request $request){
        $uid = Auth::user()->id;
        $this->validate($request, [
            'price' => 'required'
        ]);
        $user = User::where('id', $uid)->with(['user_profile','credit'])->first();
        if($user->user_profile->bank == null || $user->user_profile->no_rek == null || $user->user_profile->transfer_name == null)
        {
            return \Redirect::back()->with('alert-failed','informasi bank anda belum diisi');
        }
        if($request->price > $user->credit->credit){
            return \Redirect::back()->with('alert-failed','nominal lebih besar dari saldo wallet anda yang tersedia');
        }
        $credit = new creditlog;
        $payment = new PaymentDetail;
        $payment_id = sprintf('WD-%07d', PaymentDetail::orderBy('id', 'desc')->first()->id + 1);
        $invoice = sprintf('INV-%07d', PaymentDetail::orderBy('id', 'desc')->first()->id + 1);
        $nominal = $request->price;
        $credit->BankName = $user->userprofile->bank;
        $credit->OwnerName = $user->userprofile->transfer_name;
        $credit->RekNo = $user->userprofile->no_rek;
        $credit->status = 'withdraw';
        $credit->user_id = $uid;
        $credit->nominal = $nominal;
        $credit->reason = 'request withdraw';
        $credit->payment_id = $payment_id;
        $payment->payment_id = $payment_id;
        $payment->invoice = $invoice;
        $payment->paid_status = 'withdraw pending';
        $credit->save();
        $payment->save();
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
        try{
            Mail::send('prosespayadmin', ['invoice' => $payment_id], function ($message)
            {
                $message->subject('request withdrawal wallet');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to('jobtaskerindonesia@gmail.com');
            });
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
        return back()->with('alert-success','Request withdraw telah berhasil diajukan, silahkan cek email anda');
    }

    public function confirmation($id){
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $uid = Auth::user()->id;
        $payment = PaymentDetail::where('payment_id',$id)->first();
        $credit = creditlog::where('payment_id',$id)->first();
        $credit->confirmation_at = $now;
        if($request->image != null){
            $name=$request->image->getClientOriginalName();
            if(\File::exists(public_path().'/images/topup/'.$name)){
                $name = 'topup/'.str_random(5).$id.".jpg";
            }
            $request->image->move(public_path().'/images/topup', $name);  
            $credit->image = $name;
        }  
        $credit->save();
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
