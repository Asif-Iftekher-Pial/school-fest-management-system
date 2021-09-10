@extends('layouts.main')
@section('title', "School Dashboard")
@section('content')
<div class="main-top-bg mb-0" style="border-bottom: 3px solid gold">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="border-left border-danger pl-3">School Dashboard</h3>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-3" style="background-color: #124378; min-height: 40vw;">
			@include('schools.partials.sidebar')
		</div>
		<div class="col-9">
			@if(!is_null($event))
			<div class="row">
				<div class="col-12 col-sm-5">
					<img class="img-thumbnail my-3" src="{{ asset('uploads/'.$event->eventimg) }}" alt="Event Image">
				</div>
				<div class="col-12 col-sm-7">
					<h3 class="my-3">{{ $event->title }}</h3>
					<p class="text-justify"> 
						{{ $event->description }}
					</p>
				</div>
			</div>
			@else
			<div class="row">
				<div class="col-12">
					<h3 class="my-3">Welcome to Stem fest</h3>
				</div>
			</div>
			@endif
		</div>
	</div>
</div>
@endsection