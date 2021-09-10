@extends('layouts.main')
@section('title', "School Dashboard")
@section('content')

<div class="main-top-bg mb-0" style="border-bottom: 3px solid gold">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="border-left border-danger pl-3">Student List</h3>
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
			<div class="m-3">
				<div class="row">
					<div class="col">
						<a class="btn btn-sm btn-primary mb-3" href="{{ url('/students/create') }}">Add New</a>
					</div>
				</div>
				
				<div class="row">
					<div class="col-12">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Sl No</th>
										<th>Student Group Name</th>
										<th>Student Name</th>
										<th>Class</th>
										<th>Email</th>
										<th>Mobile</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@if(count($data)>0)
										@foreach($data as $gdata)
											<tr>
												<td>{{ $loop->iteration  }}</td>
												<td>{{ $gdata->studentgroup->title }}</td>
												<td>{{ $gdata->name }}</td>
												<td>{{ $gdata->class }}</td>
												<td>{{ $gdata->email }}</td>
												<td>{{ $gdata->mobile }}</td>
												<td>
													<a class="btn btn-primary btn-sm" href="{{ url('/students/edit/'.$gdata->id) }}">Edit</a>
												</td>
											</tr>
										@endforeach
									@else
									<tr>
										<td class="text-center" colspan="6">No Student Register</td>
									</tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection