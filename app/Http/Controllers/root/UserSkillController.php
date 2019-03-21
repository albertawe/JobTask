<?php

namespace App\Http\Controllers\root;

use App\User;
use App\UserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserSkill;
use Auth;
use App\blog;
use Carbon\Carbon;

class UserSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::where('id', $id)->with(['user_skill', 'user_profile' ,'credit'])->first();
        $blogs = blog::all();
        $salah = '';
        return view('afterlogin.skill',compact('user','blogs','id','salah'));
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
        $id = Auth::user()->id;
        $user = User::where('id', $id)->with(['user_skill','credit'])->first();
        $user_skill = $user->user_skill;
        if($request->has('image')){
            $user_skill->images = json_encode($request->image);
        }
        else {
            $user_skill->images = null;
        }
        $user_skill->tagline = $request->get('tagline');
        $user_skill->transportation = $request->get('transportation');
        $user_skill->workexperience = $request->get('workexperience');
        $user_skill->language = $request->get('language');
        $user_skill->qualification = $request->get('qualification');
        if($request->cv != null){
        $name=$request->cv->getClientOriginalName();
        if(\File::exists(public_path().'/images/cv/'.$name)){
            $name = str_random(5).$id.".jpg";
        }
        $request->cv->move(public_path().'/images/cv', $name);  
        $user_skill->cv = $name;  
        }
        $user_skill->save();
        return redirect()->back()->with('alert-success','Berhasil upload gambar baru');
    }

    public function uploadpic(Request $request)
    {
        $this->validate($request, [
            'pic' => 'required',
            'pic.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $id = Auth::user()->id;
        $user = User::where('id', $id)->with(['user_skill','credit'])->first();
        $user_skill = $user->user_skill;
        if($request->hasfile('pic'))
        {
           foreach($request->file('pic') as $image)
           {
               $name=$image->getClientOriginalName();
               if(\File::exists(public_path().'/images/quali'.$name)){
                $name = str_random(5).$id.".jpg";
               }
               $image->move(public_path().'/images/quali', $name);  
               $data[] = $name;  
           }
           if($user_skill->images){
            foreach (json_decode($user_skill->images) as $img){
            array_push($data,$img);
            }
            $user_skill->images = json_encode($data);   
            }
            else {
            $user_skill->images = json_encode($data);
            }
        }
        $user_skill->save();
        return redirect()->back()->with('alert-success','Berhasil upload gambar baru');
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
