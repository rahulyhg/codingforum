<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/atom-one-dark.min.css">

    {{-- Tiny mce editor code --}}

    {{-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=do0nbotvxye20w0pvow53medmrk8jevrrmwv1jddutx3dn8w"></script>
    <script>tinymce.init({selector:'textarea'});</script> --}}

    {{-- Tiny mce editor code end --}}

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                          @include('includes/logout')
                        @endguest
                    </ul>
                </div>
            </div>

        </nav>

        <main class="py-4">

             <div class="container">

              <div class="row">

              <div class="col-md-4">
                <a href="{{route('discussion.create')}}" class="btn btn-block btn-primary mb-2">Create a new discussion</a>

                <div class="card mt-4 mb-4">
                  <div class="card-body">
                    <ul class="list-group text-center">
                      <li class="list-group-item"><a href="{{route('forum.index')}}">Go to forum</a></li>
                      <li class="list-group-item"><a href="{{route('discussion.mine')}}">My Discussions</a></li>
                      <li class="list-group-item"><a href="#">Answered Discussions</a></li>
                    </ul>
                  </div>

                </div>

                <div class="card">
                   <div class="card-header">
                     Channels
                   </div>
                   <div class="card-body">
                      <ul class="list-group">
                        @foreach ($channels as $channel)
                          <li class="list-group-item"><a href="{{route('channels.show',$channel->slug)}}">{{$channel->title}}</a></li>
                        @endforeach
                      </ul>
                   </div>
                </div>
                <a href="{{route('channels.create')}}" class="btn btn-info mt-2 float-right mr-2">Create new channel</a>
              </div>
              <div class="col-md-8">
                  @yield('content')
              </div>

             </div>

            </div>
        </main>
    </div>
    <script src="/js/app.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" charset="utf-8"></script>
    <script type="text/javascript">
      @if(Session::has('like'))
       toastr.success('{{Session::get('like')}}')
      @endif
      @if(Session::has('unlike'))
       toastr.error('{{Session::get('unlike')}}')
      @endif
      @if(Session::has('watch'))
       toastr.success('{{Session::get('watch')}}')
      @endif
      @if(Session::has('unwatch'))
       toastr.error('{{Session::get('unwatch')}}')
      @endif
      @if(Session::has('answer'))
       toastr.success('{{Session::get('answer')}}')
      @endif
      @if(Session::has('discussion'))
       toastr.success('{{Session::get('discussion')}}')
      @endif
      @if(Session::has('create_channel'))
       toastr.success('{{Session::get('create_channel')}}')
      @endif
      @if(Session::has('edit_channel'))
       toastr.info('{{Session::get('edit_channel')}}')
      @endif
      @if(Session::has('delete_channel'))
       toastr.error('{{Session::get('delete_channel')}}')
      @endif
    </script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js" charset="utf-8"></script>
    <script>hljs.initHighlightingOnLoad();</script>

</body>
</html>
