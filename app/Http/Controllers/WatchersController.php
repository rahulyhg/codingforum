<?php

namespace App\Http\Controllers;
use App\Watcher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class WatchersController extends Controller
{
    public function watch($id){
      Watcher::create(['discussion_id'=>$id,'user_id'=>Auth::id()]);
      Session::flash('watch','You are watching and wants to be updated with this discussion');
      return redirect()->back();
    }

    public function unwatch($id){
      $watcher=Watcher::where('discussion_id',$id)->where('user_id',Auth::id());
      $watcher->delete();
      Session::flash('watch','You no longer wants to notify for this discussion');
      return redirect()->back();
    }
}
