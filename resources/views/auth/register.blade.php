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
    @include('includes.nav')
            
       <section class="py-5">
           <div class="container">
               <div class="row">
                   <div class="col-md-4 m-auto">
                    <div class="card">
                            <div class="card-header center">
                                <h3 class="card-title">Sign Up</h3>
                            </div>
            
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
            
                                    <div class="input-field">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                                           
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                   
            
                                    <div class="input-field">     
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                           
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    
            
                                    <div class="input-field">
                                       
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                           
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    
            
                                    <div class="input-field">
                                       
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                           
                                        </div>
                                        
                                        <input type="hidden" name="usertype" value="user">
                                    
            
                                    <div class="input-field mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn pink darken-1 white-text">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                    <p class="text-center mt-3">Already a Member? <a href="{{route('login')}}">Login</a></p>
                                </form>
                            </div>
                        </div>
               </div>
               </div>
           </div>
        </section> 

</body>
</html>
