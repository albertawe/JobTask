<?php

namespace App\Http\Controllers\root;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\jobcategory;
use App\JobPost;
use Auth;
use App\creditlog;
use App\offer;
use Mail;
use App\User;
use App\message;
use Carbon\Carbon;
use App\reporttask;
use App\PaymentDetail;
use Illuminate\Support\Facades\Storage;

class edittaskcontroller extends Controller
{
    public function showtask($id)
    {
        $uid = Auth::user()->id;
        $taskdetails = JobPost::find($id);
        if($taskdetails->posted_by_id != $uid){
            return redirect()->back();
        }
        $time = strtotime($taskdetails->due_date);
        $date = date('Y-m-d',$time);
        $categories = jobcategory::all();
        return view('afterlogin.edittask',compact('taskdetails','categories','date'));
    }

    public function uploadpic(Request $request, $id)
    {
        $this->validate($request, [
            'pic' => 'required',
            'pic.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $uid = Auth::user()->id;
        $job_post = JobPost::where('id',$id)->first();
        if($request->hasfile('pic'))
        {
           foreach($request->file('pic') as $image)
           {
               $name=$image->getClientOriginalName();
               if(\File::exists(public_path().'/images/'.$name)){
                $name = str_random(5).$job_post->id.".jpg";
               }
               $image->move(public_path().'/images/', $name);  
               $data[] = $name;  
           }
        }
        if($job_post->images){
        foreach (json_decode($job_post->images) as $img){
        array_push($data,$img);
        }
        $job_post->images = json_encode($data);   
        }
        else {
        $job_post->images = json_encode($data);
        }
        $job_post->save();
        return redirect()->back()->with('alert-success','Berhasil upload gambar baru');
    }

    public function canceltask($id){
        $job_post = JobPost::where('id',$id)->first();
        $jobname = $job_post->title;
        message::where('job_id', $id)->update(['status' => 'not active']);
        offer::where('job_id',$id)->update(['status' => 'not active']);
        if($job_post->status == 'assigned'){
        $poster = User::where('id',$job_post->posted_by_id)->with(['credit'])->first();
        $poster->credit->credit = $poster->credit->credit + $job_post->price;
        $poster->credit->save();
        }
        $job_post->status = 'canceled';
        if (is_null($job_post->assigned_tasker_id)){
            $job_post->save();
            return redirect()->back()->with('alert-success','Berhasil cancel task');
        }
        $job_post->assigned_tasker_id = null;
        $job_post->save();
        $user = User::where('id', $job_post->assigned_tasker_id)->first();
        $email = $user->email;
        try{
            Mail::send('emailcanceltask', ['job_name' => $jobname], function ($message) use ($email)
            {
                $message->subject('poster has canceled his task');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to($email);
            });
            return redirect()->back()->with('alert-success','Berhasil cancel task');
        }
        catch (Exception $e){
            return redirect()->back();
        }
    }

    public function posterfail($id){
        $job_post = JobPost::where('id',$id)->first();
        $posterid = $job_post->posted_by_id;
        $workerid = $job_post->assigned_tasker_id;
        $poster = User::where('id',$posterid)->first();
        $worker = User::where('id',$workerid)->first();
        $job_post->poster_acc = 'fail';
        $job_post->save();
        if($job_post->poster_acc == 'fail' && $job_post->worker_acc == 'fail'){
            offer::where('job_id',$id)->update(['status' => 'not active']);
            $job_post->status = 'not assigned';
            $job_post->assigned_tasker_id = null;
        }
        if($job_post->poster_acc == 'fail' && $job_post->worker_acc == 'completed'){
            $job_post->status = 'reported';
            $reporttask = new reporttask;
            $reporttask->job_id = $id;
            $reporttask->poster_id = $posterid;
            $reporttask->worker_id = $workerid;
            $reporttask->poster_status = 'evidence process';
            $reporttask->worker_status = 'evidence process';
            $reporttask->report_status = 'evidence process';
            $reporttask->poster_email = $poster->email;
            $reporttask->worker_email = $worker->email;
            $reporttask->save();
            $job_post->save();
            return redirect()->back()->with('alert-success','pekerjaan ini telah dilanjutkan menjadi tahap pelaporan');
        }
        $job_post->save();
        return redirect()->back()->with('alert-success','poster telah konfirmasi bahwa worker telah datang');
    }

    public function workerfail($id){
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $job_post = JobPost::where('id',$id)->first();
        $job_post->worker_acc = 'fail';
        $jobname = $job_post->title;
        $posterid = $job_post->posted_by_id;
        if($job_post->poster_acc == 'fail' && $job_post->worker_acc == 'fail'){
            offer::where('job_id',$id)->update(['status' => 'not active']);
            $job_post->status = 'canceled';
        }
        $user = User::where('id', $posterid)->with(['user_profile','credit'])->first();
        $current_credit = $user->credit->credit;
        $increased_credit = $current_credit + $job_post->price;
        $user->credit->credit = $increased_credit;
        $payment = new PaymentDetail;
        $payment_id = sprintf('TP-%07d', PaymentDetail::orderBy('id', 'desc')->first()->id + 1);
        $invoice = sprintf('INV-%07d', PaymentDetail::orderBy('id', 'desc')->first()->id + 1);
        $credit = new creditlog;
        $credit->status = 'refund';
        $credit->user_id = $posterid;
        $credit->nominal = $job_post->price;
        $credit->completed_at = $now;
        $credit->reason = 'task failed to be done';
        $credit->payment_id = $payment_id;
        $payment->payment_id = $payment_id;
        $payment->invoice = $invoice;
        $payment->paid_status = 'paid';
        $credit->save();
        $payment->save();
        $user->credit->save();
        $email = $user->email;
        $firstname = $user->user_profile->first_name;
        $lastname = $user->user_profile->last_name;
        $job_post->save();
        try{
            Mail::send('emailtaskfailed', ['job_name' => $jobname, 'first_name' => $firstname, 'last_name' => $lastname ], function ($message) use ($email)
            {
                $message->subject('it seems your task failed to be done');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to($email);
            });
        }
        catch (Exception $e){
            return redirect()->back();
        }
        return redirect()->back()->with('alert-success','berhasil mengkonfirmasi hasil pekerjaan');
    }

    public function posteracc($id){
        $job_post = JobPost::where('id',$id)->first();
        $job_post->poster_acc = 'arrived';
        $job_post->save();
        return redirect()->back()->with('alert-success','poster telah konfirmasi bahwa worker telah datang');
    }

    public function workeracc($id){
        $job_post = JobPost::where('id',$id)->first();
        $job_post->worker_acc = 'arrived';
        $job_post->save();
        return redirect()->back()->with('alert-success','worker telah konfirmasi bahwa worker telah datang');
    }
    
    public function postercom($id){
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $job_post = JobPost::where('id',$id)->first();
        $job_post->poster_acc = 'completed';
        if($job_post->poster_acc == $job_post->worker_acc){
            $job_post->status = 'finished';
            $jobname = $job_post->title;
            $jobid = $job_post->payment_id;
            $uid = $job_post->assigned_tasker_id;
            message::where('job_id', $id)->update(['status' => 'not active']);
            PaymentDetail::where('Payment_id',$jobid)->update(['paid_status' => 'paid']);
            $payment = new PaymentDetail;
            $payment_id = sprintf('TP-%07d', PaymentDetail::orderBy('id', 'desc')->first()->id + 1);
            $invoice = sprintf('INV-%07d', PaymentDetail::orderBy('id', 'desc')->first()->id + 1);
            $credit = new creditlog;
            $credit->status = 'honor';
            $credit->user_id = $uid;
            $credit->completed_at = $now;
            $credit->nominal = $job_post->price;
            $credit->reason = 'finish a task';
            $credit->payment_id = $payment_id;
            $payment->payment_id = $payment_id;
            $payment->invoice = $invoice;
            $payment->paid_status = 'paid';
            $credit->save();
            $payment->save();
            $user = User::where('id', $uid)->with(['user_profile','credit'])->first();
            $current_credit = $user->credit->credit;
            $increased_credit = $current_credit + $job_post->price;
            $user->credit->credit = $increased_credit;
            $user->credit->save();
            $email = $user->email;
            $firstname = $user->user_profile->first_name;
            $lastname = $user->user_profile->last_name;
            try{
                Mail::send('emailfinishjob', ['job_name' => $jobname, 'first_name' => $firstname, 'last_name' => $lastname ], function ($message) use ($email)
                {
                    $message->subject('you have finished your job, checkout your wallet');
                    $message->from('jobtaskerindonesia@gmail.com');
                    $message->to($email);
                });
            }
            catch (Exception $e){
                return redirect()->back();
            }
        }
        $job_post->save();
        return redirect()->back()->with('alert-success','poster telah konfirmasi bahwa worker telah datang');
    }

    public function workercom($id){
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $job_post = JobPost::where('id',$id)->first();
        $job_post->worker_acc = 'completed';
        if($job_post->poster_acc == 'fail' && $job_post->worker_acc == 'completed'){
        $posterid = $job_post->posted_by_id;
        $workerid = $job_post->assigned_tasker_id;
        $poster = User::where('id',$posterid)->first();
        $worker = User::where('id',$workerid)->first();
            $job_post->status = 'reported';
            $reporttask = new reporttask;
            $reporttask->job_id = $id;
            $reporttask->poster_id = $posterid;
            $reporttask->worker_id = $workerid;
            $reporttask->poster_status = 'evidence process';
            $reporttask->worker_status = 'evidence process';
            $reporttask->report_status = 'evidence process';
            $reporttask->poster_email = $poster->email;
            $reporttask->worker_email = $worker->email;
            $reporttask->save();
            $job_post->save();
            return redirect()->back()->with('alert-success','pekerjaan ini telah dilanjutkan menjadi tahap pelaporan');
        }
        if($job_post->poster_acc == $job_post->worker_acc){
            $job_post->status = 'finished';
            $jobname = $job_post->title;
            $jobid = $job_post->payment_id;
            $uid = $job_post->assigned_tasker_id;
            message::where('job_id', $id)->update(['status' => 'not active']);
            PaymentDetail::where('Payment_id',$jobid)->update(['paid_status' => 'paid']);
            $payment = new PaymentDetail;
            $payment_id = sprintf('TP-%07d', PaymentDetail::orderBy('id', 'desc')->first()->id + 1);
            $invoice = sprintf('INV-%07d', PaymentDetail::orderBy('id', 'desc')->first()->id + 1);
            $credit = new creditlog;
            $credit->status = 'honor';
            $credit->user_id = $uid;
            $credit->completed_at = $now;
            $credit->nominal = $job_post->price;
            $credit->reason = 'finish a task';
            $credit->payment_id = $payment_id;
            $payment->payment_id = $payment_id;
            $payment->invoice = $invoice;
            $payment->paid_status = 'paid';
            $credit->save();
            $payment->save();
            $user = User::where('id', $uid)->with(['user_profile','credit'])->first();
            $current_credit = $user->credit->credit;
            $increased_credit = $current_credit + $job_post->price;
            $user->credit->credit = $increased_credit;
            $user->credit->save();
            $email = $user->email;
            $firstname = $user->user_profile->first_name;
            $lastname = $user->user_profile->last_name;
            try{
                Mail::send('emailfinishjob', ['job_name' => $jobname, 'first_name' => $firstname, 'last_name' => $lastname ], function ($message) use ($email)
                {
                    $message->subject('you have finished your job, checkout your wallet');
                    $message->from('jobtaskerindonesia@gmail.com');
                    $message->to($email);
                });
            }
            catch (Exception $e){
                return redirect()->back();
            }
        }
        $job_post->save();
        return redirect()->back()->with('alert-success','poster telah konfirmasi bahwa worker telah datang');
    }

    public function updatetask(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'type' => 'required',
            'category' => 'required',
            'duedate' => 'required|date|after:today',
            'price' => 'required',
            'address' => 'required|min:10',
            'jobdescription' => 'required|min:20',
        ]);
        
        $uid = Auth::user()->id;
        $job_post = JobPost::where('id',$id)->first();
        $job_post->title = $request->title;
        $job_post->posted_by_id = $uid;
        $job_post->job_type = $request->type;
        $job_post->job_category = $request->category;
        $job_post->due_date = $request->duedate;
        $job_post->price = $request->price;
        $job_post->address = $request->address;
        $job_post->job_description = $request->jobdescription;
            if($request->has('image')){
                $job_post->images = json_encode($request->image);
            }
            else {
                $job_post->images = null;
            }
        $job_post->save();
        return redirect('mytask')->with('alert-success','Berhasil Edit pekerjaan');
    }

}
