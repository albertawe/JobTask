<?php

namespace App\Http\Controllers\root;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JobPost;
use App\PaymentDetail;
use App\offer;
use Auth;
use Carbon\Carbon;

class ViewJobcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function term()
    {
        return view('term');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $today = Carbon::now()->format('Y-m-d');
        $taskdetails = JobPost::find($id);
        $deadlinecancel = date("Y-m-d",strtotime($taskdetails->due_date."-2 day"));
        $price = $taskdetails->price;
        $tid = $taskdetails->id;
        $user_id = Auth::user()->id;
        $paymentdetails = PaymentDetail::where('payment_id',$taskdetails->payment_id)->first();

        $offers = offer::where('job_id',$tid)->where('status','active')->get();
        $uid = strval($user_id);
        // $offers = $offers->where('nego','<=',$price);
        return view('afterlogin.viewtask',compact('taskdetails','paymentdetails','offers','uid','today','deadlinecancel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
