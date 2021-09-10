@extends('layouts.main')
@section('title', "School Dashboard")
@section('content')
<div class="main-top-bg mb-0" style="border-bottom: 3px solid gold">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="border-left border-danger pl-3">School Profile</h3>
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
			<div class="my-3">
				<a class="btn btn-sm btn-primary my-3" href="{{ url('/school-profile/edit/'.$school_profile->id) }}">Edit</a>
				<div class="row">
					<div class="col-8">
						<div class="table-responsive">
							<table class="table table-bordered">
								<tr>
									<th>School Name</th>
									<td>{{ Auth::User()->name }}</td>
								</tr>
								<tr>
									<th>Branch Name</th>
									<td>{{ Auth::User()->branch_name }}</td>
								</tr>
								<tr>
									<th>School Email</th>
									<td>{{ Auth::User()->email }}</td>
								</tr>
								<tr>
									<th>Mobile Number</th>
									<td>{{ Auth::User()->mobile }}</td>
								</tr>
								<tr>
									<th>Coordinator Name</th>
									<td>{{ $school_profile->coordinator??'N/A' }}</td>
								</tr>
								<tr>
									<th>Coordinator Phone</th>
									<td>{{ $school_profile->mobile_number??'N/A' }}</td>
								</tr>
								<tr>
									<th>School Secondery Phone</th>
									<td>{{ $school_profile->school_phone??'N/A' }}</td>
								</tr>
								<tr>
									<th>School Address</th>
									<td>{{ $school_profile->school_address??'N/A' }}</td>
								</tr>
								
							</table>
						</div>
					</div>
					<div class="col-4">
						<p class="text-center">School Logo</p>
						<img class="img-fluid d-block mx-auto" src="{{ asset('uploads/profiles/'.$school_profile->images) }}" alt="School Logo">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection