@extends('admin.layouts.mainlayout')

@section('content')

	<div class="container-fluid">
		<h3 class="my-3">Edit Event</h3>

		<a class="btn btn-primary btn-sm my-3" href="{{ route('events.index') }}">Back</a>

		<hr>
		<form method="POST" action="{{ route('events.update', $event->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
		        {{ method_field('PATCH') }}
		        {{ csrf_field() }}
		<div class="row">
	        <div class="col-12 col-sm-6">
	            <div class="form-group">
	                <label for="event_title">Event Title</label>
	                <input type="text" class="form-control" id="event_title" name="title" value="{{ $event->title }}" required >
	            </div>
	            <div class="form-group">
	                <label for="status">Event Status</label>
	                <select class="form-control" name="status">
	                    <option selected disabled>--Select Option--</option>
	                    <option value="0" {{ $event->status == 0 ? 'selected' : '' }}>Inactive Event</option>
	                    <option value="1" {{ $event->status == 1 ? 'selected' : '' }}>Active Event</option>
	                    <option value="2" {{ $event->status == 2 ? 'selected' : '' }}>Close Event</option>
	                </select>
	            </div>
	            <div class="form-group">
	                <label for="description">Description</label>
	                <textarea class="form-control tinymce" rows="5" name="description">{{ $event->description }}</textarea>
	            </div>
	        </div>
	        <div class="col-12 col-sm-6">
	        	<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
	        	    <label for="files">Upload Page Image</label>
	        	    <input type="file" class="form-control-file" id="files" name="image" >
	        	    <small>Image size 600px X 800px</small> 
	                {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
	        	</div>
	            
	            <div class="form-group">
	                <label>Selected Image</label> <br>
	                <img style="max-height: 300px;" class="img-responsive" id="image" src="{{ asset('uploads/'.$event->eventimg) }}" />
	            </div>
	        </div>
	        <div class="col-12">
	        	<button type="submit" class="btn btn-success btn-sm my-3">Update Event</button>
	        </div>
		</div>
		</form>
	</div>

@endsection