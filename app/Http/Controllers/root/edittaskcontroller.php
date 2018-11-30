<?php

namespace App\Http\Controllers\root;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\jobcategory;
use App\JobPost;
use Auth;
use App\PaymentDetail;

class edittaskcontroller extends Controller
{
    public function showtask($id)
    {
        $taskdetails = JobPost::find($id);
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
        return redirect('mytask');
    }

    public function updatetask(Request $request, $id)
    {
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
        $job_post->images = json_encode($request->image);
        $job_post->save();
        return redirect('mytask');
    }

}
