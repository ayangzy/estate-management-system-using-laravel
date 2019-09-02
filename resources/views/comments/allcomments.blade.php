@extends('layouts.app')


@section('content')
<div class="card">
        <div class="card-header">
           <h3 class="card-title">All users Comments</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Content</th>
                            <th>User</th>
                           
                            <th>Remove</th>
                        </tr>
                        
                        <tbody>
                            @foreach($comments as $comment)
                            <tr>
                            <td>{{$comment->body}}</td>
                            <td>{{$comment->user->name}}</td>
                            
            
                            <td width="10%" class="center">
                                <a href="{{route('comment.delete', ['id'=>$comment->id])}}" class="btn btn-danger">
                                     <i class="fas fa fa-trash"></i>
                                </a>
                            </td>
                            </tr>
    
                            @endforeach
                        </tbody>
                    </thead>
                </table>
                <div class="text-center">
                    {{$comments->links()}}
                  </div>
            </div>
        </div>
    </div>
@endsection