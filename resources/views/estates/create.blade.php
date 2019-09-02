@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Create Houses Location</h3>
    </div>
        <div class="card-body">
            <form action="{{route('estate.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="input-field">
                <input type="text" name="apartmentname" class="form-control  @error('apartmentname') is-invalid @enderror" placeholder="Apartment Name" value="{{old('apartmentname')}}">
                    @error('apartmentname')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-field">
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Annual Bill" value="{{old('price')}}">
                   
                    @error('price')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-field">
                    
                    <input type="text" name="location" class="form-control map-input @error('location') is-invalid @enderror" placeholder="Address"  value="{{old('location')}}" id="address-input">
                   
                    
                    @error('location')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-field">
                <textarea name="description" class="form-control materialize-textarea @error('description') is-invalid @enderror" placeholder="Enter Description">{{old('description')}}</textarea>

                    @error('description')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-field">
                    <input type="file" name="picture" class="form-control @error('picture') is-invalid @enderror" placeholder="image">
                    @error('picture')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>


                <div class="input-field">
                    <button class="btn pink darken-1 white-text">Add Details</button>
                </div>
                
            </form>
               
        </div>
</div>






@stop