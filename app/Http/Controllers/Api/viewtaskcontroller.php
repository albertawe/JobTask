<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobPost;
use App\PaymentDetail;
use App\offer;

class viewtaskcontroller extends Controller
{
    public function showtask($id)
    {
        $taskdetails = JobPost::where('id',$id)->get();
        $paymentdetails = PaymentDetail::where('payment_id',$taskdetails->payment_id);
        $offers = offer::where('job_id',$taskdetails->id);
        return view('afterlogin.viewtask',compact('taskdetails','paymentdetails','offers'));
    }
}
