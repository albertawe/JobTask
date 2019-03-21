<?php

namespace App\Http\Controllers\root;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\jobcategory;
use App\JobPost;
use Auth;
use App\PaymentDetail;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = jobcategory::all();
        return view('afterlogin.jobpost',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'type' => 'required',
            'category' => 'required',
            'duedate' => 'required|date|after:today',
            'price' => 'required',
            'address' => 'required|min:10',
            'jobdescription' => 'required|min:20',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $id = Auth::user()->id;
        $job_post = new JobPost;
        $payment = new PaymentDetail;
        $payment_id = sprintf('P-%07d', JobPost::orderBy('id', 'desc')->first()->id + 1);
        $invoice = sprintf('INV-%07d', PaymentDetail::orderBy('id', 'desc')->first()->id + 1);
        $job_post->payment_id = $payment_id;
        $job_post->title = $request->title;
        $job_post->status = 'not assigned';
        $job_post->posted_by_id = $id;
        $job_post->job_type = $request->type;
        $job_post->job_category = $request->category;
        $job_post->due_date = $request->duedate;
        $job_post->price = $request->price;
        $job_post->address = $request->address;
        $job_post->job_description = $request->jobdescription;
        $payment->payment_id = $payment_id;
        $payment->invoice = $invoice;
        $payment->paid_status = 'not paid';
        if($request->hasfile('filename'))
        {

           foreach($request->file('filename') as $image)
           {
               $name=$image->getClientOriginalName();
               $image->move(public_path().'/images/', $name);  
               $data[] = $name;  
               $job_post->images=json_encode($data);
           }
        }
        
        $payment->save();
        $job_post->save();
        return redirect('mytask');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taskdetails = JobPost::find($id);
        $time = strtotime($taskdetails->due_date);
        $date = date('Y-m-d',$time);
        $categories = jobcategory::all();
        return view('afterlogin.edittask',compact('taskdetails','categories','date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'type' => 'required',
            'category' => 'required',
            'duedate' => 'required|date|after:today',
            'price' => 'required',
            'address' => 'required|min:10',
            'jobdescription' => 'required|min:20',
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $uid = Auth::user()->id;
        $job_post = JobPost::where('id',$id);
        $job_post->title = $request->title;
        $job_post->posted_by_id = $id;
        $job_post->job_type = $request->type;
        $job_post->job_category = $request->category;
        $job_post->due_date = $request->duedate;
        $job_post->price = $request->price;
        $job_post->address = $request->address;
        $job_post->job_description = $request->jobdescription;
        if($request->hasfile('filename'))
        {

           foreach($request->file('filename') as $image)
           {
               $name=$image->getClientOriginalName();
               $image->move(public_path().'/images/', $name);  
               $data[] = $name;  
           }
        }
        $job_post->images=json_encode($data);
        $job_post->save();
        return redirect('mytask');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
