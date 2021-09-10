@extends('layouts.main')

@section('title', "Our Partners")

@section('content')

	<div class="main-top-bg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h3 class="border-left border-danger pl-3">Video Gallery</h3>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			@foreach($data as $item)
			<div class="col-12 col-sm-6 my-3">
				<div class="embed-responsive embed-responsive-16by9">
				    <iframe class="embed-responsive-item" src="{{ $item->video_url }}"  allowscriptaccess="always" allow="autoplay"></iframe>
				</div>
				<h4 class="text-center my-3">{{ $item->title }}</h4>
			</div>
			@endforeach
			{{-- <div class="col-12 col-sm-6 my-3">
				<div class="embed-responsive embed-responsive-16by9">
				    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/_FpPNRYsDnQ"  allowscriptaccess="always" allow="autoplay"></iframe>
				</div>
			</div>
			<div class="col-12 col-sm-6 my-3">
				<div class="embed-responsive embed-responsive-16by9">
		          	<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/qZJS5uW35U8"  allowscriptaccess="always" allow="autoplay"></iframe>
		        </div>
			</div> --}}
		</div>
	</div>

@endsection