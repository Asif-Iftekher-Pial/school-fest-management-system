@extends('layouts.main')

@section('title', "Contact Us")

@section('content')

	<div class="main-top-bg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h3 class="border-left border-danger pl-3">Contact Us</h3>
				</div>
			</div>
		</div>
	</div>

	<div class="container mb-5">
		<div class="row">
			<div class="col-12 col-sm-6">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14595.170051861107!2d90.4023305!3d23.8615005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x662d13081edbb710!2sInternational%20Hope%20School%20Bangladesh!5e0!3m2!1sen!2sbd!4v1611090239072!5m2!1sen!2sbd" width="100%" height="550px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
			<div class="col-12 col-sm-6">
				<div class="contact-form">
					<h1 class="title">Contact Us</h1>
					<h2 class="subtitle">We are here assist you.</h2>
					<form action="">
						
						<div class="form-group">
						    <label for="name">Your Name</label>
						    <input type="text" class="form-control" placeholder="Full Name" id="name">
						</div>
						
						<div class="form-group">
						    <label for="email">Email address:</label>
						    <input type="email" class="form-control" placeholder="Enter email" id="email">
						</div>
						<div class="form-group">
						    <label for="mobile">Moblie Number</label>
						    <input type="text" class="form-control" placeholder="Enter mobile number" id="mobile">
						 </div>
						<div class="form-group">
						    <label for="message">Your message</label>
						    <textarea class="form-control" id="message" rows="3"></textarea>
						 </div>
						<button class="btn btn-success">Get a Call Back</button>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection