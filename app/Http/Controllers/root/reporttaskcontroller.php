<?php

namespace App\Http\Controllers\root;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Mail;
use App\User;
use App\jobpost;
use App\reporttask;

class reporttaskcontroller extends Controller
{
    public function index($id){
        $reporttask = reporttask::where('id',$id)->first();
        $reportid = $reporttask->id;
        return view('afterlogin.reporttask',compact('reporttask','reportid'));
    }

    public function uploadevidence(Request $request, $id){
        $this->validate($request, [
            'pic' => 'required',
            'pic.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tagline' => 'required|min:20',
        ]);
        $reporttask = reporttask::where('id',$id)->first();
        $task = jobpost::where('id',$reporttask->job_id)->first();
        $jobname = $task->title;
        $jobpid = $task->payment_id;
        $uid = Auth::user()->id;
        if($uid == $reporttask->poster_id){
        $reporttask->poster_message = $request->tagline;
        if($request->hasfile('pic'))
        {
           foreach($request->file('pic') as $image)
           {
               $name=$image->getClientOriginalName();
               if(\File::exists(public_path().'/images/report'.$name)){
                $name = str_random(5).$id.".jpg";
               }
               $image->move(public_path().'/images/report', $name);  
               $data[] = $name;  
           }
           if($reporttask->poster_image){
            foreach (json_decode($reporttask->poster_image) as $img){
            array_push($data,$img);
            }
            $reporttask->poster_image = json_encode($data);   
            }
            else {
            $reporttask->poster_image = json_encode($data);
            }
        }
        $reporttask->poster_status = 'evidence uploaded';
        $user = user::where('id',$uid)->with(['user_profile'])->first();
        $firstname = $user->user_profile->first_name;
        $lastname = $user->user_profile->last_name;
        $email = $user->email;
        try{
            Mail::send('emailevidencesent', ['job_name' => $jobname, 'first_name' => $firstname, 'last_name' => $lastname ], function ($message) use ($email)
            {
                $message->subject('you have sent your evidence to us');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to($email);
            });
        }
        catch (Exception $e){
            return redirect()->back();
        }
        }
        elseif($uid == $reporttask->worker_id){
        $reporttask->worker_message = $request->tagline;
        if($request->hasfile('pic'))
        {
           foreach($request->file('pic') as $image)
           {
               $name=$image->getClientOriginalName();
               if(\File::exists(public_path().'/images/report'.$name)){
                $name = str_random(5).$id.".jpg";
               }
               $image->move(public_path().'/images/report', $name);  
               $data[] = $name;  
           }
           if($reporttask->worker_image){
            foreach (json_decode($reporttask->worker_image) as $img){
            array_push($data,$img);
            }
            $reporttask->worker_image = json_encode($data);   
            }
            else {
            $reporttask->worker_image = json_encode($data);
            }
        }
        $reporttask->worker_status = 'evidence uploaded';      
        $user = user::where('id',$uid)->with(['user_profile'])->first();
        $firstname = $user->user_profile->first_name;
        $lastname = $user->user_profile->last_name;
        $email = $user->email;
        try{
            Mail::send('emailevidencesent', ['job_name' => $jobname, 'first_name' => $firstname, 'last_name' => $lastname ], function ($message) use ($email)
            {
                $message->subject('you have sent your evidence to us');
                $message->from('jobtaskerindonesia@gmail.com');
                $message->to($email);
            });
        }
        catch (Exception $e){
            return redirect()->back();
        }
        }
        if($reporttask->poster_status == 'evidence uploaded' && $reporttask->worker_status = 'evidence uploaded'){
            $reporttask->report_status = 'process by admin';
            $user1 = user::where('id',$reporttask->poster_id)->with(['user_profile'])->first();
            $email1 = $user1->email;
            $user2 = user::where('id',$reporttask->worker_id)->with(['user_profile'])->first();
            $email2 = $user2->email;
            try{
                Mail::send('emailevidencecomplete', ['job_name' => $jobname, 'first_name' => $firstname, 'last_name' => $lastname ], function ($message) use ($email1)
                {
                    $message->subject('both party have submitted both evidence');
                    $message->from('jobtaskerindonesia@gmail.com');
                    $message->to($email1);
                });
            }
            catch (Exception $e){
                return redirect()->back();
            }
            try{
                Mail::send('emailevidencecomplete', ['job_name' => $jobname], function ($message) use ($email2)
                {
                    $message->subject('both party have submitted both evidence');
                    $message->from('jobtaskerindonesia@gmail.com');
                    $message->to($email2);
                });
            }
            catch (Exception $e){
                return redirect()->back();
            }
            try{
                Mail::send('emailevidencecompleteadmin', ['job_name' => $jobname,'job_pid' => $jobpid], function ($message) use ($email2)
                {
                    $message->subject('both party have submitted both evidence for a reported task');
                    $message->from('jobtaskerindonesia@gmail.com');
                    $message->to('jobtaskerindonesia@gmail.com');
                });
            }
            catch (Exception $e){
                return redirect()->back();
            }
        }
        $reporttask->save();
        return redirect()->back();
    }

    public function continueatoffice($id){
        $reporttask = reporttask::where('id',$id)->first();
        $reporttask->report_status = 'taken to office';
        $emailworker = $reporttask->worker_email;
        $emailposter = $reporttask->poster_email;
        //email both party to come
        //set date at next week
        //if both party dont come, credit diambil sistem
    }

    public function evidence($id){
        $report = reporttask::where('id',$id)->first();
        return view('afterlogin.evidence',compact('report'));
    }

    public function posterright($id){
        $reporttask = reporttask::where('id',$id)->first();
        $reporttask->report_status = 'completed';
        $reporttask->poster_status = 'innocent';
        $reporttask->worker_status = 'guilty';
        $emailworker = $reporttask->worker_email;
        $emailposter = $reporttask->poster_email;
        $job = jobpost::where('id',$reporttask->job_id)->first();
        $poster = user::where('id',$reporttask->poster_id)->with(['user_profile','credit'])->first();
        $worker = user::where('id',$reporttask->poster_id)->with(['user_profile'])->first();
        $poster->credit->credit = $poster->credit->credit + $job->price;
        $poster->credit->save();
        $job->status = 'not assigned';
        $job->assigned_tasker_id = null;
        $job->save();
        $reporttask->save();
        //email poster benar
        //email  worker salah
    }

    public function workerright($id){
        $reporttask = reporttask::where('id',$id)->first();
        $reporttask->report_status = 'completed';
        $reporttask->poster_status = 'guilty';
        $reporttask->worker_status = 'innocent';
        $emailworker = $reporttask->worker_email;
        $emailposter = $reporttask->poster_email;
        $job = jobpost::where('id',$reporttask->job_id)->first();
        $poster = user::where('id',$reporttask->poster_id)->with(['user_profile'])->first();
        $worker = user::where('id',$reporttask->poster_id)->with(['user_profile','credit'])->first();
        $worker->credit->credit = $worker->credit->credit + $job->price;
        $worker->credit->save();
        $job->status = 'canceled';
        $job->assigned_tasker_id = null;
        $job->save();
        $reporttask->save();
        //email worker benar
        //email poster salah
    }
}
