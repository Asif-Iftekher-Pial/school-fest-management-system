@extends('layouts.main')
@section('title', "School Dashboard")
@section('content')
<div class="main-top-bg mb-0" style="border-bottom: 3px solid gold">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="border-left border-danger pl-3">Add Students </h3>
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
						<a class="btn btn-sm btn-primary mb-3" href="{{ url('/students') }}">Back</a>
					</div>
				</div>
				<div class="row my-3">
					<div class="col-12">
						<h5> <u>Student Add</u></h5>
					</div>
					<div class="col-12">
						@if ($errors->any())
						     @foreach ($errors->all() as $error)
						         <div class="bg-info px-3"> * {{$error}}</div>
						     @endforeach
						 @endif
					</div>
				</div>
				<form action="{{ url('/students/store') }}" method="Post" enctype="multipart/form-data" accept-charset="UTF-8">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-6">
							<div class="form-group">
							    <label for="status">Event Title</label>
							    <select class="form-control" name="event_id">
							        {{-- <option selected disabled>--Select Option--</option> --}}
							        @foreach($event as $items)
							            <option value="{{$items->id }}">{{ $items->title }}</option>
							        @endforeach
							    </select>
							</div>
							<div class="form-group">
							    <label for="name">Student Name</label>
							    <input type="text" class="form-control" id="name" name="name" placeholder="Student Group Name">
							</div>
							<div class="form-group">
							    <label for="email">Student Email</label>
							    <input type="email" class="form-control" id="email" name="email" placeholder="Email address">
							</div>
							<div class="form-group">
							    <label for="mobile">Student Mobile</label>
							    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
							    <label for="status">Student Group</label>
							    <select class="form-control" name="studentgroup_id">
							        <option selected disabled>--Select Option--</option>
							        @foreach($sgroup as $items)
							            <option value="{{$items->id }}">{{ $items->title }}</option>
							        @endforeach
							    </select>
							</div>
							<div class="form-group">
							    <label for="status">Category Title</label>
							    <select class="form-control demo2" name="category_id">
							        <option selected disabled>--Select Option--</option>
							        @foreach($category as $item)
							            <option value="{{$item->id }}">{{ $item->title }}</option>
							        @endforeach
							    </select>
							</div>
							<div class="form-group">
							    <label for="status">Event Group</label>
							    <select class="form-control demo3 demo4" name="group_id">
							        
							    </select>
							</div>
							<div class="form-group">
							    <label for="status">School Class</label>
							    <select class="form-control demo5" name="class">
							        
							    </select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('java_script')
<script>
$(document).ready(function(){
	$(document).on('change', '.demo2', function(){
		// console.log('It is ok');
		var category_id = $(this).val();
		// console.log(category_id);
		var opp= " ";
		$.ajax({
		type:'get',
		url:'{{ url('/get-group')}}',
		data:{ 'id' : category_id},
		success: function(data){
				opp+= '<option value="0" selected disabled >--select an option-- </option>';
				for (var i = 0; i < data.length; i++) {
				opp+= '<option value="'+ data[i].id +'">'+ data[i].title + '</option>';
			}
				$('.demo3').html(opp);
			},
			error:function(){
			}
		});
	});
});

$(document).ready(function(){
	$(document).on('change', '.demo4', function(){
		//
		var group_id = $(this).val();
		var oppn= " ";
		$.ajax({
			type:'get',
			url:'{{ url('/get-class')}}',
			data:{ 'id' : group_id},
				// console.log('It is ok'),
				success: function(data){
				var opp = "";
				for (var i = 0; i < data.length; i++) {
				opp+=  data[i].class_name;
				}
				var array = opp.split(',');
				oppn+= '<option value="0" selected disabled >--select an option-- </option>';
				for (var i = 0; i < array.length; i++) {
				oppn+= '<option value="'+ array[i] +'">'+ array[i]  + '</option>';
			}
				$('.demo5').html(oppn);
			},
				error:function(){
			}
		});
	});
});
</script>
@endsection