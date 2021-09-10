@extends('layouts.main')

@section('title', "Our Partners")

@section('content')

	<div class="main-top-bg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h3 class="border-left border-danger pl-3">Photo Gallery</h3>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			@foreach($albums as $data)
			<div class="col-12">
				<h4 class="my-3 font-weight-bold">{{ $data->title }}</h4>
			</div>

			<div class="row">
				@foreach($data->Albumimage as $images)
				<div class="col-lg-3 col-md-4 col-xs-6 thumb">
					<a href="{{ asset('uploads/albums/'. $images->img_name) }}" class="fancybox" rel="ligthbox">
						<img  src="{{ asset('uploads/albums/'. $images->img_name) }}" class="zoom img-thumbnail "  alt=" Event Image">
					</a>
				</div>
				@endforeach
			</div>

			@endforeach
		</div>
	</div>

@endsection

@section('java_script')
	<script type="text/javascript">
		$(document).ready(function(){
		$(".fancybox").fancybox({
		openEffect: "none",
		closeEffect: "none"
		});
		
		$(".zoom").hover(function(){
				
				$(this).addClass('transition');
			}, function(){
		
				$(this).removeClass('transition');
			});
		});
	</script>

@endsection