@extends('layouts.app')

@section('content')
thi sis the map view
<div style="width: 500px; height: 500px;">
	{!! Mapper::render() !!}
</div>



@endsection