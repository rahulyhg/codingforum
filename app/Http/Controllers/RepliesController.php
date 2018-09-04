<?php

namespace App\Http\Controllers;
use App\Reply;
use App\Like;
use App\Discussion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class RepliesController extends Controller
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

        $this->validate($request,[
          'content'=>'required'
        ]);

      Reply::create([
        'content'=>$request->content,
        'user_id'=>Auth::User()->id,
        'discussion_id'=>$request->discussion_id
      ]);



    Session::flash('answer','Thank you for your answer');
    return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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

    public function like($id){

      Like::create([

        'reply_id'=>$id,
        'user_id'=>Auth::id()

       ]);
       Session::flash('like','You liked the reply');
       return redirect()->back();
    }

    public function unlike($id){
      $like=Like::where('reply_id',$id)->where('user_id',Auth::id())->first();
      $like->delete();
      Session::flash('unlike','You unliked the reply');
      return redirect()->back();
    }

    public function best_answer($id){
      $reply=Reply::find($id);
      $reply->best_answer=1;
      $reply->save();
      Session::flash('success','Reply has been marked as best answer');
      return redirect()->back();
    }

}
