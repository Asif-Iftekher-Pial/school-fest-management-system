@extends('layouts.main')

@section('title', "Chairman Message")

@section('content')

<div class="main-top-bg">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="border-left border-danger pl-3">Chairman Message</h3>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-12 col-sm-5">
			<img class="img-fluid" src="{{ asset('uploads/chairimage/'.$data->chair_image) }}" alt="">
		</div>
		<div class="col-12 col-sm-7">
			<div class="text-justify mb-5">
				<h3>Message</h3>
				<p>
					{{ $data->chair_message }}
				</p>
			</div>
		</div>
	</div>
</div>

@endsection