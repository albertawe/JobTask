<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\offer;
use App\JobPost;

class AcceptOfferController extends Controller
{
    public function Accept($offer_id){
        $offer = offer::find($offer_id);
        $job_id = $offer->job_id;
        $user_offer_id = $offer->user_offer_id;
        $job = JobPost::find($job_id);
        $job->status = "assigned";
        $job->price = $offer->nego;
        $job->assigned_tasker_id = $user_offer_id;
        $job->save();
        return redirect()->back();
    }
    public function finish($id){
        $job = JobPost::find($id);
        $job->status = "finished";
        $job->save();
        return redirect()->back();
    }
}
