<?php

namespace App\Http\Controllers\root;

use Illuminate\Http\Request;
use Mail;
use App\Http\Controllers\Controller;
use App\offer;
use App\JobPost;
use App\user;
use Auth;
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
        $deducted_credit = $current_credit - $job->price;
        $user->credit->credit = $deducted_credit;
        $user->save();
        $job_id = $offer->job_id;
        $user_offer_id = $offer->user_offer_id;
        $job = JobPost::find($job_id);
        $uid = $job->assigned_tasker_id;
        $job->status = "assigned";
        $job->price = $offer->nego;
        $job->assigned_tasker_id = $user_offer_id;
        $jobname = $job->title;
        $job->save();
        $email = $user->email;
        $firstname = $user->user_profile->first_name;
        $lastname = $user->user_profile->last_name;
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
        message::where('job_id', $id)->update(['status' => 'not active']);
        $job->status = 'finished';
        $jobname = $job->title;
        $jobid = $job->payment_id;
        $job->save();
        $uid = $job->assigned_tasker_id;
        $user = User::where('id', $uid)->with(['user_profile'])->first();
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
        }
        catch (Exception $e){
            return redirect()->back();
        }
        try{
            Mail::send('emailfinishjobadmin', ['job_name' => $jobname, 'job_id' => $jobid], function ($message)
            {
                $message->subject('ada pekerjaan yang selesai');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to('jobtaskerindonesia@gmail.com');
            });
            return redirect()->back();
        }
        catch (Exception $e){
            return redirect()->back();
        }
    }
    public function cancel($id){
        $offer = offer::where('id', $id);
        $offer->status = 'not active';
        $offer->save();
        return redirect()->back();
    }
}