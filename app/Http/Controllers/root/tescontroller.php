<?php

namespace App\Http\Controllers\root;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JobPost;
use App\PaymentDetail;
use App\offer;
use Auth;
use Carbon\Carbon;

class tescontroller extends Controller
{
    public function index($id)
    {
        $today = Carbon::now()->format('Y-m-d');
        $taskdetails = JobPost::find($id);
        $price = $taskdetails->price;
        $tid = $taskdetails->id;
        $user_id = Auth::user()->id;
        $paymentdetails = PaymentDetail::where('payment_id',$taskdetails->payment_id)->first();

        $offers = offer::where('nego', '<=', $price)->where('job_id',$tid)->where('status','active')->get();
        $uid = strval($user_id);
        // $offers = $offers->where('nego','<=',$price);
        return view('afterlogin.tes',compact('taskdetails','paymentdetails','offers','uid','today'));
    }
}
