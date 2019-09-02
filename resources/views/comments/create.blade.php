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
    
    <link href="{{asset('assets/css/materialize.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

</head>
<body>
    @include('includes.nav')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 m-auto">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="card-title">Add your comment</h4>
                        </div>
                       
                        <div class="card-body">
                            <form action="{{route('comment.store', ['id'=>$estate->id])}}" method="post">
                                @csrf
                                <div class="input-field">
                                    <input type="text" name="name" value="{{Auth::user()->name}}" disabled>
                                </div>

                                <div class="form-group">
                                    <textarea name="body"  class="form-control @error ('body') is-invalid @enderror" placeholder="Leave Comment here...."></textarea>

                                    @error('body')
                                    <div class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <input type="hidden" name="estate_id" value="{{$estate->id}}">

                                <div class="input-field">
                                    <button class="btn pink darken-1 white-text">
                                       
                                        Leave Comment
                                    </button>
                                </div>
                            </form>
                            <hr>
                            <h3 class="pink-text center">{{$estate->apartmentname}}</h3>
                            <hr>
                          
                            @foreach($comments as $comment)
                               <ul class="list-group list-group-flush">
                                   <li class="list-group-item mb-2">
                                       {{$comment->body}}
                                        <h6 class="pink-text">{{$comment->user->name}}</h6>
                                        <p>{{$comment->created_at->diffForHumans()}}</p>
                                       @if($comment->user->id ==Auth::id())
                                        <div class="commentdetails">
                                          <a href="{{route('comment.edit', ['id'=>$comment->id])}}" class="btn btn-primary"><i class="fas fa fa-edit"></i></a>
                                          &nbsp;
                                        <a href="{{route('comment.delete', ['id'=>$comment->id])}}" class="btn btn-danger"><i class="fas fa fa-trash"></i></a>
                                        </div> 
                                        @endif

                                        
                                   </li>
                               </ul>
                            @endforeach

                            {{$comments->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('includes.notification')
</body>
</html>