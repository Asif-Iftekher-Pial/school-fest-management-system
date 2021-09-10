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
			<img class="img-fluid" src="{{ asset('main/dist/images/two.jpg') }}" alt="">
		</div>
		<div class="col-12 col-sm-7">
			<div class="text-justify mb-5">
				<h3>Message</h3>
				<p>
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat ad autem reprehenderit aut quibusdam praesentium necessitatibus ab magni ipsam, veniam asperiores mollitia laborum obcaecati enim qui debitis rem delectus esse. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perspiciatis distinctio facilis ea sit, iusto sint. Quos, fugit maxime natus pariatur temporibus laboriosam dolore exercitationem? 
					<br> <br>
					Ex praesentium similique sit, sapiente iste? Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto natus at iure repellat facere excepturi similique sunt, fuga illum pariatur quis asperiores libero deserunt aliquid vel. Tempore recusandae nulla fugiat? 
					
				</p>
			</div>
		</div>
	</div>
</div>

@endsection