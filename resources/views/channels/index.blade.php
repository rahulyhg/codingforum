@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Channels</div>
              
                 <div class="text-center mt-3">
                  <a href="{{route('channels.create')}}" class="btn btn-outline-success">Create New Channel</a>
                 </div>

                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Created</th>
                        <th>Updated</th>
                      </thead>
                      <tbody>
                        @foreach ($channels as $channel)
                          <tr>
                           <td>{{$channel->title}}</td>
                           <td><a href="{{route('channels.edit',$channel->id)}}" class="btn btn-primary">Edit</a></td>
                           <td>
                             {!!Form::open(['method'=>'DELETE','action'=>['ChannelsController@destroy',$channel->id]])!!}
                               {!!Form::submit('Destroy',['class'=>'btn btn-danger'])!!}
                             {!!Form::close()!!}
                           </td>
                           <td>{{$channel->created_at->diffForHumans()}}</td>
                           <td>{{$channel->updated_at->diffForHumans()}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
