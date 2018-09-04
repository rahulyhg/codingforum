<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Channel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class DiscussionsController extends Controller
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

    public function mine(){
      $user=Auth::User();
      $discussions=$user->discussions()->orderBy('id','desc')->paginate(4);
      return view('forum.index',compact('discussions'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $channelslist=Channel::pluck('title','id')->all();
        return view('discussion.create',compact('channelslist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'title'=>'required',
          'content'=>'required'
        ]);

        $user=Auth::User();

        $discussion=Discussion::create([
          'title'=>$request->title,
          'content'=>$request->content,
          'channel_id'=>$request->channel_id,
          'user_id'=>$user->id,
          'slug'=>str_slug($request->title),
          'created_at'=>$user->created_at,
          'updated_at'=>$user->updated_at
        ]);
        Session::flash('discussion','Your discussion was successfully created');
        return redirect()->route('discussionSlug',['slug'=>$discussion->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $discussion=Discussion::where('slug',$slug)->first();
        return view('discussion.show',compact('discussion'));
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
