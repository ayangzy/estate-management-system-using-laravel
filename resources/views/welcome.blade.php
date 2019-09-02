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

    <!-- Styles -->
  
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/materialize.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <!--NAVBAR-->
          @include('includes.nav')

<!-- Landing -->
<div class="landing">
        <div class="dark-overlay landing-inner text-light">
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-center">
                <h1 class="display-3 mb-4">Estate Management System
                </h1>
                <p class="lead">New Guest? Create an account and have full access otherwise login if already have an account</p>
                <hr />
                <a href="{{route('register')}}" class="btn btn-lg pink darken-1 mr-2 white-text">Register</a>
                <a href="{{route('login')}}" class="btn btn-lg btn-light">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>



<script>

        $(document).ready(function(){
        var header = $('.landing');
    
        var backgrounds = new Array(
            'url(img/house4.jpg)'
          , 'url(img/house6.jpg)'
          , 'url(img/house2.jpg)'
         
        );
    
        var current = 0;
    
        function nextBackground() {
            current++;
            current = current % backgrounds.length;
            header.css('background-image', backgrounds[current]);
        }
        setInterval(nextBackground, 3500);
    
        header.css('background-image', backgrounds[0]);
        });
        </script>


    <footer class="bg-dark text-white mt-5 p-4 text-center">
        <p>Copyright &copy; <span id="year"></span> Estate Management System</p>
      </footer>
    
      <script src="assets/js/bootstrap.min.js"></script>
    
      <script>
        $('#year').text(new Date().getFullYear());
        
        $('.collapse').collapse()
    
      </script>


</body>
</html>