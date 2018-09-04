@extends('layouts.app')

@section('content')


   @if (count($discussions)<1)
      <h2 class="m-5 text-center text-danger">Sorry, no discussions on this channel yet</h2>
      <h4 class="text-center alert alert-success">If you want to start ,just click on <span class="font-weight-bold">create a new discussion</span> on left side and start a discussion</h4>
   @endif
        @foreach ($discussions as $d)

            <div class="card m-4">

                <div class="card-header" style="background:white;">
                <img style="border-radius:50%;" src="{{$d->user->avatar?$d->user->avatar:'http://placehold.it/50x50'}}" alt="" width="50" height="50">
                  <span class="ml-2">{{$d->user->name}},&nbsp;<b>{{$d->created_at->diffForHumans()}}</b></span>
                  <a class="float-right btn btn-outline-primary mt-2" href="{{route('discussionSlug',['slug'=>$d->slug])}}">View Discussion</a>
                </div>

                <div class="card-body">

                  <h4 class="text-center font-weight-bold">{{ucwords($d->title)}}</h4>
                  <p class="text-center mt-3">{!!Markdown::convertToHtml(str_limit($d->content,200))!!}</p>

                </div>
                <div class="card-footer">
                   <p>{{$d->replies->count()}} Replies
                   <a class="btn btn-default btn-xs float-right" href="{{route('channels.show',$d->channel->slug)}}" style="border:1px solid grey;color:black;">{{$d->channel->title}}</a>
                  </p>
                </div>
            </div>

              @endforeach
              <div style="margin-left:40%;">
                {{$discussions->links()}}
              </div>

@endsection
