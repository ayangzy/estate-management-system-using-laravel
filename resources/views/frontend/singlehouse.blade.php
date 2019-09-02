<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Estate Ms</title>

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
  
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/materialize.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

</head>
<body>
    @include('includes.nav')
    <section class="py-4">
        <div class="container">
                @if(Auth::check() && Auth::user())
                <a href="/visitorsdashboard" class="btn btn-lg btn-default">Back to Houses</a>
                @else
                <a href="{{route('frontend.index')}}" class="btn btn-lg btn-default">Back to Houses</a>
                @endif
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-body">
                        <a href=""><img src="{{asset($house->picture)}}" class="img-thumbnail text-center" width="100%"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="list-group list-group-flush">
                        <li class="list-group-item text-secondary">
                            Apartment Name:
                            <span class="float-right">{{$house->apartmentname}}</span>
                        </li>

                        <li class="list-group-item text-secondary">
                           Annual Bill Pay:
                            <span class="float-right">&#8358 {{number_format(($house->price), 2)}}</span>
                         </li>

                         <li class="list-group-item text-secondary">
                           <p class="text-center">House Address:</p>
                             <p class="text-center">{{$house->location}}</p>
                        </li>

                        <li class="list-group-item text-secondary">
                            <p class="text-center">House description:</p>
                            <p class="text-center">{{$house->description}}</p>
                         </li>
                </ul>

                @if(Auth::check() && Auth::user())
                <a href="{{route('comment.create', ['id' =>$house->id])}}"  class="btn btn-info btn-block mt-2 white-text"></i>Leave Comment</a>
                @else
                <a href="{{route('frontend.create')}}" class="btn btn-info btn-block mt-2 white-text"></i>Leave Comment</a>
                @endif

        </div>
    </div>
    </section>
    @include('includes.notification')
</body>
</html>