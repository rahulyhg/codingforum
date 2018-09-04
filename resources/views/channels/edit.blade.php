@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit a Channel</div>

                <div class="card-body">
                    {!!Form::model($channel,['method'=>'PATCH','action'=>['ChannelsController@update',$channel->id]])!!}
                    <div class="form-group">
                      {!!Form::text('title',null,['class'=>'form-control','placeholder'=>'Enter title for channel'])!!}
                    </div>
                      {!!Form::submit('Save Channel',['class'=>'btn btn-primary'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@include('includes/form_error')

@endsection
