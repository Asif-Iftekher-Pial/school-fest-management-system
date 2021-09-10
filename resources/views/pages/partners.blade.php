@extends('layouts.main')

@section('title', "Our Partners")

@section('content')

	<div class="main-top-bg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h3 class="border-left border-danger pl-3">Our Partners</h3>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row row-cols-1 row-cols-sm-3 row-cols-md-4">
			@foreach($pdata as $data)
			<div class="col m-4">
				<img class="img-fluid d-block my-2 mx-auto" src="{{ asset('uploads/sponsors/'.$data->sponsors_image) }}" alt="Sponsors Logo" style="max-height: 200px">
				<h4 class="text-center my-3">{{ $data->title }}</h4>
			</div>
			@endforeach
		</div>
	</div>

@endsection