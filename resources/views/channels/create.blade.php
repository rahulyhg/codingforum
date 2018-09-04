@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a Channel</div>

                <div class="card-body">

                    {!!Form::open(['method'=>'post','action'=>'ChannelsController@store'])!!}
                    
                    <div class="form-group">
                      {!!Form::text('title',null,['class'=>'form-control','placeholder'=>'Enter title for channel'])!!}
                    </div>
                      {!!Form::submit('Create Channel',['class'=>'btn btn-primary'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@include('includes/form_error')

@endsection
