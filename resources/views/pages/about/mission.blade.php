@extends('layouts.main')

@section('title', "Mission & Vission")

@section('content')

<div class="main-top-bg">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="border-left border-danger pl-3">Mission & Vission</h3>
			</div>
		</div>
	</div>
</div>

	<div class="container mb-5">
		<div class="row">
			<div class="col-12 col-sm-5">
				<img class="img-fluid" src="{{ asset('uploads/missionvission/'.$data->image) }}" alt="">
			</div>
			<div class="col-12 col-sm-7">
				<div class="text-justify mb-5">
					<h3>Our Mission</h3>
					<p class="mb-5">
						{{ $data->mission }}
					</p>

					<h3>Our Vission</h3>
					<p>
					{{ $data->vission }}	
					</p>
				</div>
			</div>
		</div>
	</div>
 
@endsection