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
use Carbon\Carbon;

class AcceptOfferController extends Controller
{

    public function Accept($offer_id){
        $today = Carbon::now()->format('Y-m-d');
        $newDate = date("Y.m.d",strtotime($today."+2 day"));
        $offer = offer::where('id',$offer_id)->first();
        $uid = Auth::user()->id;
        $poster = User::where('id', $uid)->with(['credit'])->first();
        if ($poster->credit->credit < $offer->nego){
            return back()->with('alert-failed','Credit tidak cukup untuk memilih tawaran tersebut');
        }
        $user_offer_id = $offer->user_offer_id;
        $job_id = $offer->job_id;
        $job = JobPost::where('id',$job_id)->first();
        $job->assigned_tasker_id = $user_offer_id;
        $job->offer_id = $offer_id;
        $offer->deadline = $newDate;
        $offer->save();
        $job->save();
        $jobname = $job->title;
        $user = User::where('id', $user_offer_id)->with(['user_profile'])->first();
        $email = $user->email;
        $firstname = $user->user_profile->first_name;
        $lastname = $user->user_profile->last_name;
        try{
            Mail::send('emailaccoff', ['job_name' => $jobname ,'first_name' => $firstname, 'last_name' => $lastname ], function ($message) use ($email)
            {
                $message->subject('your offer accepted,will you take it?');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to($email);
            });
            return redirect('mytask')->with('alert-success','Berhasil menerima tawaran');
        }
        catch (Exception $e){
            return redirect()->back();
        }
        //return redirect('mytask')->with('alert-success','Berhasil menerima tawaran, menunggu kabar dari worker');
    }

    public function rejectbyworker($jobid){
        $job = JobPost::where('id',$jobid)->first();
        $offer_id = $job->offer_id;
        $offer = offer::where('id',$offer_id)->first();
        $offer->deadline = null;
        $offer->status = 'not active';
        $jobname = $job->title;
        $job->assigned_tasker_id = null;
        $job->offer_id = null;
        $offer->save();
        $job->save();
        $id = $job->posted_by_id;
        $user = User::where('id', $id)->with(['user_profile','credit'])->first();
        $firstname = $user->user_profile->first_name;
        $lastname = $user->user_profile->last_name;
        $email = $user->email;
        try{
            Mail::send('emailoffrejected', ['job_name' => $jobname, 'first_name' => $firstname, 'last_name' => $lastname ], function ($message) use ($email)
            {
                $message->subject('worker are not available for this job, please choose other offer');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to($email);
            });
        }
        catch (Exception $e){
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function cancelaccept($jobid){
        $job = JobPost::where('id',$jobid)->first();
        $offer_id = $job->offer_id;
        $offer = offer::where('id',$offer_id)->first();
        $offer->deadline = null;
        $offer->status = 'not active';
        $jobname = $job->title;
        $job->assigned_tasker_id = null;
        $job->offer_id = null;
        $job->status = 'not assigned';
        $offer->save();
        $job->save();
        $id = $job->posted_by_id;
        $user = User::where('id', $id)->with(['user_profile','credit'])->first();
        $firstname = $user->user_profile->first_name;
        $lastname = $user->user_profile->last_name;
        $email = $user->email;
        try{
            Mail::send('emailoffrejected', ['job_name' => $jobname, 'first_name' => $firstname, 'last_name' => $lastname ], function ($message) use ($email)
            {
                $message->subject('worker are not available for this job, please choose other offer');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to($email);
            });
        }
        catch (Exception $e){
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function acceptbyworker($jobid){
        $job = JobPost::where('id',$jobid)->first();
        $offer_id = $job->offer_id;
        $offer = offer::where('id',$offer_id)->first();
        $id = $job->posted_by_id;
        $user = User::where('id', $id)->with(['user_profile','credit'])->first();
        if ($user->credit->credit < $offer->nego){
            return back()->with('alert-failed','Credit poster tidak cukup untuk tawaran anda');
        }
        $offer->deadline = null;
        $offer->status = 'chosen';
        $offer->save();
        $current_credit = $user->credit->credit;
        $deducted_credit = $current_credit - $offer->nego;
        $user->credit->credit = $deducted_credit;
        $user->credit->save();
        $job->status = "assigned";
        $job->price = $offer->nego;
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
        $email2 = $user->email;
        $firstname = $user2->user_profile->first_name;
        $lastname = $user2->user_profile->last_name;
        $firstname2 = $user->user_profile->first_name;
        $lastname2 = $user->user_profile->last_name;
        try{
            Mail::send('emailacceptoff', ['invoice' => $invoice ,'payment_id' => $payment_id,'first_name' => $firstname, 'last_name' => $lastname ], function ($message) use ($email2)
            {
                $message->subject('your have chosen your worker');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to($email2);
            });
        }
        catch (Exception $e){
            return redirect()->back();
        }
        try{
            Mail::send('emailaccoff', ['job_name' => $jobname ,'first_name' => $firstname, 'last_name' => $lastname ], function ($message) use ($email)
            {
                $message->subject('your have accepted a new task');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to($email);
            });
            return redirect('mytask')->with('alert-success','Berhasil menerima pekerjaan');
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
            return redirect('mytask')->with('alert-success','pekerjaan telah selesai dikerjakan');
        }
        catch (Exception $e){
            return redirect()->back();
        }
    }

    public function cancel($id){
        $offer = offer::where('id', $id)->first();
        $offer->status = 'not active';
        $offer->save();
        return redirect()->back();
    }
}