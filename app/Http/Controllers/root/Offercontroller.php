<?php

namespace App\Http\Controllers\root;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\offer;
use Redirect;
use Auth;
use App\JobPost;
class Offercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $offers = offer::where('user_offer_id',$id)->get();
        return view('afterlogin.viewoffer',compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'price' => 'required',
            'description' => 'required|min:10',
        ]);
        $uid = Auth::user()->id;
        $offer = new offer;
        $offer->job_title = $request->get('job_title');
        $offer->job_id = $request->get('job_id');
        $offer->nego = $request->get('price');
        $offer->status = 'active';
        $offer->description = $request->get('description');
        $offer->user_offer_id = $uid;
        $offer->save();
        return \Redirect::back()->with('viewtask')->with('alert-success','Berhasil Kirim Tawaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
