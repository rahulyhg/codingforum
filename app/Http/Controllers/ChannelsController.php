<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channels=Channel::all();
        return view('channels.index',compact('channels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('channels.create');
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
          'title'=>'required'
        ]);
        $user=Auth::User();
        $data=[
         'title'=>$request->title,
         'slug'=>str_slug($request->title),
         'created_at'=>$user->created_at,
         'updated_at'=>$user->updated_at
        ];

        Channel::create($data);
        Session::flash('create_channel','New Channel Created');
        return redirect('/channels');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $channel=Channel::where('slug',$id)->first();
        $discussions=$channel->discussions()->orderBy('id','desc')->paginate(4);
        return view('channels.show',compact('discussions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $channel=Channel::findOrFail($id);
        return view('channels.edit',compact('channel'));
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
        $channel=Channel::findOrFail($id);
        $input=$request->all();
        $channel->update($input);
        Session::flash('edit_channel','Channel edited successfully');
        return redirect('/channels');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $channel=Channel::findOrFail($id);
        $channel->delete();
        Session::flash('delete_channel','Channel deleted successfully');
        return redirect('/channels');
    }
}
