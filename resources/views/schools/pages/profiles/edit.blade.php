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
				<a class="btn btn-sm btn-info my-3" href="{{ url('/school-profile') }}">Back</a>
				<form action="{{ url('/school-profile/update/'.$data->id) }}" method="Post" enctype="multipart/form-data" accept-charset="UTF-8">
					{{ method_field('PATCH') }}
					{{ csrf_field() }}
				<div class="row">
					<div class="col-6">
						<div class="form-group">
						    <label for="coordinator">Coordinator Name</label>
						    <input type="text" class="form-control" id="coordinator" name="coordinator" placeholder="full name" value="{{ $data->coordinator }}">
						</div>
						<div class="form-group">
						    <label for="mobile_number">Coordinator Mobile Number</label>
						    <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Coordinator Mobile Number" value="{{ $data->mobile_number }}">
						</div>
						<div class="form-group">
						    <label for="school_phone">School Secondery Phone Number</label>
						    <input type="text" class="form-control" id="school_phone" name="school_phone" placeholder="Secondery Phone Number" value="{{ $data->school_phone }}">
						</div>
						<div class="form-group">
						    <label for="school_address">School Address</label>
						    <textarea class="form-control" id="school_address" name="school_address" rows="3">{{ $data->school_address?? "School Address" }}</textarea>
						</div>
					</div>
					<div class="col-6">
						<p class="text-center">School Logo</p>
						<div class="form-group">
						    <input type="file" class="form-control-file" id="files" name="images">
						    <small>Logo size 300px X 300px</small>
						 </div>
						<img class="img-fluid d-block mx-auto" id="image" src="{{ asset('uploads/profiles/'.$data->images) }}" alt="School Logo" style="max-height: 200px">
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<button type="submit" class="btn btn-success">Update</button>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('java_script')


<script type="text/javascript">
    document.getElementById("files").onchange = function () {
        var reader = new FileReader();

        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            document.getElementById("image").src = e.target.result;
        };

        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    };
</script>

@endsection