<?php

namespace App\Http\Controllers\root;

use Illuminate\Http\Request;
use Mail;
use App\Http\Controllers\Controller;
use App\offer;
use App\JobPost;
use App\user;
use Auth;
use App\creditlog;
use App\PaymentDetail;
use App\message;
class AcceptOfferController extends Controller
{
    public function Accept($offer_id){
        $offer = offer::find($offer_id);
        $id = Auth::user()->id;
        $user = User::where('id', $id)->with(['user_profile','credit'])->first();
        if ($user->credit->credit < $offer->nego){
            return back()->with('alert-failed','Credit tidak cukup untuk memilih tawaran tersebut');
        }
        $current_credit = $user->credit->credit;
        $deducted_credit = $current_credit - $offer->nego;
        $user->credit->credit = $deducted_credit;
        $user->credit->save();
        $job_id = $offer->job_id;
        $user_offer_id = $offer->user_offer_id;
        $job = JobPost::find($job_id);
        $uid = $job->assigned_tasker_id;
        $job->status = "assigned";
        $job->price = $offer->nego;
        $job->assigned_tasker_id = $user_offer_id;
        $jobname = $job->title;
        $job->save();
        $payment = new PaymentDetail;
        $payment_id = sprintf('WD-%07d', PaymentDetail::orderBy('id', 'desc')->first()->id + 1);
        $invoice = sprintf('INV-%07d', PaymentDetail::orderBy('id', 'desc')->first()->id + 1);
        $credit = new creditlog;
        $credit->status = 'honor';
        $credit->user_id = $id;
        $credit->nominal = $offer->nego;
        $credit->reason = 'hire a worker';
        $credit->payment_id = $payment_id;
        $payment->payment_id = $payment_id;
        $payment->invoice = $invoice;
        $payment->paid_status = 'paid';
        $credit->save();
        $payment->save();
        $user2 = User::where('id', $offer->user_offer_id)->with(['user_profile','credit'])->first();
        $email = $user2->email;
        $firstname = $user2->user_profile->first_name;
        $lastname = $user2->user_profile->last_name;
        try{
            Mail::send('emailaccoff', ['job_name' => $jobname ,'first_name' => $firstname, 'last_name' => $lastname ], function ($message) use ($email)
            {
                $message->subject('your offer accepted!!');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to($email);
            });
            return redirect()->back();
        }
        catch (Exception $e){
            return redirect()->back();
        }
        
    }
    public function finish($id){
        $job = JobPost::find($id);
        $job->status = 'finished';
        $jobname = $job->title;
        $jobid = $job->payment_id;
        $job->save();
        $uid = $job->assigned_tasker_id;
        message::where('job_id', $id)->update(['status' => 'not active']);
        PaymentDetail::where('Payment_id',$jobid)->update(['paid_status' => 'paid']);
        $payment = new PaymentDetail;
        $payment_id = sprintf('TP-%07d', PaymentDetail::orderBy('id', 'desc')->first()->id + 1);
        $invoice = sprintf('INV-%07d', PaymentDetail::orderBy('id', 'desc')->first()->id + 1);
        $credit = new creditlog;
        $credit->status = 'honor';
        $credit->user_id = $uid;
        $credit->nominal = $job->price;
        $credit->reason = 'finish a task';
        $credit->payment_id = $payment_id;
        $payment->payment_id = $payment_id;
        $payment->invoice = $invoice;
        $payment->paid_status = 'paid';
        $credit->save();
        $payment->save();
        $user = User::where('id', $uid)->with(['user_profile'])->first();
        $current_credit = $user->credit->credit;
        $increased_credit = $current_credit + $job->price;
        $user->credit->credit = $increased_credit;
        $user->credit->save();
        $email = $user->email;
        $firstname = $user->user_profile->first_name;
        $lastname = $user->user_profile->last_name;
        try{
            Mail::send('emailfinishjob', ['job_name' => $jobname, 'first_name' => $firstname, 'last_name' => $lastname ], function ($message) use ($email)
            {
                $message->subject('you have finished your job, payment on the way');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to($email);
            });
            return redirect()->back();
        }
        catch (Exception $e){
            return redirect()->back();
        }
        // try{
        //     Mail::send('emailfinishjobadmin', ['job_name' => $jobname, 'job_id' => $jobid], function ($message)
        //     {
        //         $message->subject('ada pekerjaan yang selesai');
        //         $message->from('jobtaskerindonesia@gmail.com');
        //         $message->to('jobtaskerindonesia@gmail.com');
        //     });
            
        // }
        // catch (Exception $e){
        //     return redirect()->back();
        // }
    }
    public function cancel($id){
        $offer = offer::where('id', $id);
        $offer->status = 'not active';
        $offer->save();
        return redirect()->back();
    }
}