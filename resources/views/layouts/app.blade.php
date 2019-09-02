<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Estate Ms') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{asset('js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{asset('assets/js/materialize.min.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
		

    <!-- Styles -->
   
    
    <link href="{{asset('assets/css/materialize.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    

</head>
<body>
    <div id="app">
      <!--NAVBAR-->
<header>
    
	<nav class="nav-wrapper pink darken-1">
	<div class="container">
        @if(!Auth::user())
         <a href="/" class="brand-logo">Estate Ms</a>
		<a href="" class="sidenav-trigger" data-target="nav-links">
			<i class="material-icons">menu</i>
        </a>

        @elseif(Auth::check() && Auth::user()->isAdmin())


        <a href="/home" class="brand-logo">Estate Ms</a>
		<a href="" class="sidenav-trigger" data-target="nav-links">
			<i class="material-icons">menu</i>
        </a>
        @else


        <a href="/visitorsdashboard" class="brand-logo">Estate Ms</a>
		<a href="" class="sidenav-trigger" data-target="nav-links">
			<i class="material-icons">menu</i>
        </a>

        @endif

        @if(!Auth::user()) 
		<ul class="right hide-on-med-and-down">
			<li><a href="/">Home</a></li>
            <li><a href="">About</a></li>	
            <li><a href="">Contact</a></li>	
        </ul>
        @else
        <ul class="right hide-on-med-and-down">
                <li><a href="">{{Auth::user()->name}}</a></li>
                <li>
                       
                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        
                        Logout
                  
                </a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                </form>	
            </ul>
        @endif
	</div>
</nav>

<ul class="sidenav gray darken-2" id="nav-links">
	<li><a href="">Sign Up</a></li>	
	<li><a href="">Login</a></li>
</ul>
</header>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                        @if(Auth::check())
                        @if(Auth::user()->isAdmin())
                    <div class="col-md-4">
                       
                        <div class="card">
                             <div class="card-header">
                                 <h3 class="card-title">Side Menu</h3>
                                </div>
                                    <div class="card-body">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <a href="{{route('estate.create')}}" class="list-link">
                                                    <i class="fas fa fa-plus"></i>
                                                    Create Houses</a>
                                            </li>

                    
                                            <li class="list-group-item">
                                                    <a href="{{route('estate.index')}}" class="list-link">
                                                        <i class="fas fa fa-eye"></i>
                                                        View and update Houses</a>
                                                </li>

                                            
                                                <li class="list-group-item">
                                                    <a href="{{route('comment.allcomments')}}" class="list-link">
                                                        <i class="fas fa fa-envelope"></i>
                                                        View Comments</a>
                                                </li>
                                        </ul>
                                    </div>
                                </div>
                               
                    </div>
                    @endif
                    @endif

                    <div class="col-md-8">
                            @yield('content')
                            @yield('scripts')
                    </div>


                    @if(!Auth::user())
                    <div class="col-lg-5">
                        @yield('content1')
                    </div>
                    @endif

                    @if(Auth::check())
                    @if(Auth::user()->isUser())
                    <div class="col-lg-8 m-auto">
                            @yield('contentguest')
                           
                    </div>
                    @endif
                    @endif
                </div>
            </div>

            
           
        </main>
        
    </div>

    


    
    <script src="{{asset('js/toastr.min.js')}}"></script>
    
    
    <script>
        @if(Session::has('success'))
            toastr.success("{{Session::get('success')}}")
        @endif
    </script>
    
    <script>
            @if(Session::has('info'))
                toastr.info("{{Session::get('info')}}")
            @endif
        </script>
    
    <script>
            @if(Session::has('warning'))
                toastr.warning("{{Session::get('warning')}}")
            @endif
        </script>
</body>
</html>
