@extends('layouts.app')


@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit your apartment details</h3>
        </div>
        <div class="card-body">
                <form action="{{route('estate.update', ['id' =>$estate->id])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="input-field">
                    <input type="text" name="apartmentname" class="form-control" placeholder="Apartment Name" value="{{$estate->apartmentname}}">
                    </div>
    
                    <div class="input-field">
                        <input type="text" name="price" class="form-control" placeholder="Annual Bill" value="{{$estate->price}}">
                       
                    </div>
    
                    <div class="input-field">
                        <input type="text" name="location" class="form-control" placeholder="Address" value="{{$estate->location}}" >
                       
                    </div>
    
                    <div class="input-field">
                        <textarea name="description" class="materialize-textarea" placeholder="Enter Description">{{$estate->description}}</textarea>
    
                       
                    </div>
    
                    <div class="input-field">
                        <input type="file" name="picture" class="form-control" placeholder="image">
                        <img src="{{asset($estate->picture)}}" class="img-fluid" width="20%" height="10%">     
                    </div>

                  
                    <div class="input-field">
                            <button class="btn pink darken-1 white-text">Update Details</button>
                    </div>

                   
                </form>
        </div>
    </div>

    
@endsection