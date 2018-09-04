@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8"> --}}
            <div class="card">
                <div class="card-header text-center">Create a new discussion</div>

                <div class="card-body">
                    {!!Form::open(['method'=>'post','action'=>'DiscussionsController@store'])!!}
                      <div class="form-group">
                        {!!Form::label('channel_id','Pick a channel')!!}
                        {!!Form::select('channel_id',$channelslist,null,['class'=>'form-control'])!!}
                      </div>

                      <div class="form-group">
                        {!!Form::label('title','Enter a title')!!}
                        {!!Form::text('title',null,['class'=>'form-control'])!!}
                      </div>

                      <div class="form-group">
                        {!!Form::label('content','Ask a question')!!}
                        {!!Form::textarea('content',null,['class'=>'form-control','rows'=>8])!!}
                      </div>
                        @include('includes/form_error')
                      {!!Form::submit('Create discussion',['class'=>'btn btn-success float-right'])!!}

                    {!!Form::close()!!}
                </div>
            </div>
        {{-- </div>
    </div> --}}
</div>
@endsection
