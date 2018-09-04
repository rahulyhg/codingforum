@extends('layouts.app')

@section('content')

  <div class="card m-4">

      <div class="card-header" style="background:white;">
      <img style="border-radius:50%;" src="{{$discussion->user->avatar?$discussion->user->avatar:'http://placehold.it/50x50'}}" alt="" width="50" height="50">
        <span class="ml-2">{{$discussion->user->name}},&nbsp;<b>{{$discussion->created_at->diffForHumans()}}</b></span>
        @if ($discussion->is_being_watched_by_user())
        <a class="float-right btn btn-outline-danger mt-2" href="{{route('discussion.unwatch',['id'=>$discussion->id])}}">Do not notify me</a>
        @else
          <a class="float-right btn btn-outline-primary mt-2" href="{{route('discussion.watch',['id'=>$discussion->id])}}">Notify me</a>
        @endif
      </div>

      <div class="card-body">

        <h2 class="text-center">{{ucwords($discussion->title)}}</h2>
        <p class="text-center">{!!Markdown::convertToHtml($discussion->content)!!}</p>

      </div>
      <div class="card-footer">
         <p>{{$discussion->replies->count()}} Replies
           <a class="btn btn-default btn-xs float-right" href="{{route('channels.show',$discussion->channel->title)}}" style="border:1px solid grey;color:black;">{{$discussion->channel->title}}</a>
         </p>
      </div>
  </div>

  @foreach ($discussion->replies as $reply)
    <div class="card m-4">

        <div class="card-header" style="background:white;">
          <img style="border-radius:50%;" src="{{$reply->user->avatar?$reply->user->avatar:'http://placehold.it/50x50'}}" alt="" width="50" height="50">
          <span class="ml-2">{{$reply->user->name}},&nbsp;<b>{{$reply->created_at->diffForHumans()}}</b></span>
          {{-- <a class="float-right btn btn-outline-primary mt-2" href="{{route('discussionSlug',['slug'=>$discussion->slug])}}">View Discussion</a> --}}
        </div>

        <div class="card-body">

          {{-- <h2 class="text-center">{{ucwords($discussion->title)}}</h2> --}}
          <p class="text-center">{!!Markdown::convertToHtml($reply->content)!!}</p>

        </div>
        <div class="card-footer">
          @if ($reply->is_liked_by_auth_user())
            <a href="{{route('reply.unlike',['id'=>$reply->id])}}" class="btn btn-danger btn-xs">Unlike <span class="badge">{{$reply->likes->count()}}</span> </a>
            @else
            <a href="{{route('reply.like',['id'=>$reply->id])}}" class="btn btn-primary btn-xs">Like <span class="badge">{{$reply->likes->count()}}</span> </a>
          @endif

        </div>
    </div>
  @endforeach

  {!!Form::open(['method'=>'post','action'=>'RepliesController@store'])!!}
   <input type="hidden" name="discussion_id" value="{{$discussion->id}}">
    <div class="form-group">
        {!!Form::textarea('content',null,['class'=>'form-control','rows'=>8,'placeholder'=>'Enter your answer here'])!!}
    </div>
    {!!Form::submit('Answer',['class'=>'btn btn-block btn-dark'])!!}
  {!!Form::close()!!}

  @include('includes/form_error')

@endsection
