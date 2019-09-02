@extends('layouts.app')


@section('content')

<div class="card">
    <div class="card-header">
       <h3 class="card-title">Apartment Details</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Apartment Name</th>
                        <th>Annual Bill</th>
                        <th>Address</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>

                    <tbody>
                        @foreach($landlords as $landlord)
                        <tr>
                        <td ><img src="{{asset($landlord->picture)}}" width="50%"></td>
                        <td>{{$landlord->apartmentname}}</td>
                        <td>{{number_format(($landlord->price), 2)}}</td>
                        <td>{{$landlord->location}}</td>
                        
                        <td>
                            <a href="{{route('estate.edit', ['id' => $landlord->id])}}" class="btn btn-primary">
                                <i class="fas fa fa-edit"></i>
                            </a>
                        </td>
                           
                        <td>
                            <a href="{{route('estate.destroy', ['id' => $landlord->id])}}" class="btn btn-danger">
                                 <i class="fas fa fa-trash"></i>
                            </a>
                        </td>
                        </tr>

                        @endforeach
                    </tbody>
                </thead>
            </table>
            <div class="text-center">
                {{$landlords->links()}}
              </div>
        </div>
    </div>
</div>

@endsection