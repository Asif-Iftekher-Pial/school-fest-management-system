@extends('admin.layouts.mainlayout')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<h4 class="my-3">Edit School Info</h4>
		</div>
	</div>
	<form action="{{ url('/admin/school/'.$school->id) }}" method="POST" enctype="multipart/form-data">
		{{ method_field('PATCH') }}
            {{ csrf_field() }}
	<div class="row">
		<div class="col-12 col-sm-6">
			<div class="form-group">
			    <label for="event_title">School Name</label>
			    <input type="text" class="form-control" id="event_title" name="name" value="{{ $school->name }}" required >
			</div>
			<div class="form-group">
                <label for="event_title">Branch Name</label>
                <input type="text" class="form-control" id="event_title" name="branch_name" value="{{ $school->branch_name }}">
            </div>
            <div class="form-group">
			    <label for="event_title">School Email</label>
			    <input type="text" class="form-control" id="event_title" name="email" value="{{ $school->email }}" required >
			</div>
			<div class="form-group">
			    <label for="event_title">Mobile Number</label>
			    <input type="text" class="form-control" id="event_title" name="mobile" value="{{ $school->mobile }}" required >
			</div>
			<div class="form-group">
				<label for="status">Status</label>
                <select class="form-control" name="status">
                	<option disabled>Select an option</option>
                    <option {{ $school->status == "Active" ? "selected" : "" }}>Active</option>
                    <option {{ $school->status == "Inactive" ? "selected" : "" }}>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
		</div>
		<div class="col-12 col-sm-6">
			
		</div>
	</div>
	</form>
</div>

@endsection