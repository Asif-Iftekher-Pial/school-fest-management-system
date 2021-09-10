@extends('admin.layouts.mainlayout')

@section('content')

	<div class="container-fluid">
		<h3 class="my-3">Create New Event</h3>
		<hr>
		<form method="POST" action="{{ route('events.store') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
		        {{ csrf_field() }}
		<div class="row">
	        <div class="col-12 col-sm-6">
	            <div class="form-group">
	                <label for="event_title">Event Title</label>
	                <input type="text" class="form-control" id="event_title" name="title" placeholder="Event Title" required >
	            </div>
	            <div class="form-group">
	                <label for="status">Event Status</label>
	                <select class="form-control" name="status">
	                    <option selected disabled>--Select Option--</option>
	                    <option value="0">Inactive Event</option>
	                    <option value="1">Active Event</option>
	                    <option value="2">Close Event</option>
	                </select>
	            </div>
	            <div class="form-group">
	                <label for="description">Description</label>
	                <textarea class="form-control tinymce" rows="5" name="description"></textarea>
	            </div>
	        </div>
	        <div class="col-12 col-sm-6">
	        	<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
	        	    <label for="files">Upload Page Image</label>
	        	    <input type="file" class="form-control-file" id="files" name="image"  required="required">
	        	    <small>Image size 600px X 800px</small> 
	                {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
	        	</div>
	            
	            <div class="form-group">
	                <label>Selected Image</label>
	                <img style="max-height: 300px;" class="img-responsive" id="image" />
	            </div>
	        </div>
	        <div class="col-12">
	        	<button type="submit" class="btn btn-success">Save Event</button>
	        </div>
		</div>
		</form>
	</div>

@endsection