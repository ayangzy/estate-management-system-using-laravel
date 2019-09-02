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
    
    <section class="py-5">
        <div class="container">
            <div class="row">
                
                @foreach ( $houses as $house )
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="img-responsive">
                                <img src="{{asset($house->picture)}}" class="img-fluid">
                                <h3 class="mt-4 pink-text center">{{$house->apartmentname}}</h3>
                                <h3 class="pink-text center">&#8358 {{number_format(($house->price), 2)}}</h3>
                                <p class=" center">{{$house->location}}</p>
                                <p class="pink-text center"><i class="fas fa fa-user"></i>{{$house->user->name}} &nbsp; <i class="fas fa fa-history"></i>{{$house->created_at->diffForHumans()}} </p>
                               
                                <hr>

                               <div class="text-center">
                                    <a href="{{route('frontend.singlehouse', ['id' =>$house->id])}}" class="btn btn-block pink darken-1 white-text">More info</a>
                               
                               </div>
                            </div>      
                        </div>
                    </div>
                </div>
                @endforeach 
                
               
            </div>
        </div>
    </section>

    @include('includes.notification')
</body>

</html>