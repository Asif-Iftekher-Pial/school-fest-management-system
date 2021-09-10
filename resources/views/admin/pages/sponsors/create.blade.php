@extends('admin.layouts.mainlayout')

@section('content')

<div class="container-fluid">

<h4 class="my-3">Add New Sopnsor</h4>
<hr>
    <form method="POST" action="{{ url('/admin/sponsors') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                    <label for="event_title">Title</label>
                    <input type="text" class="form-control" id="event_title" name="title" placeholder="Title" required >
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status">
                        <option selected disabled>--Select Option--</option>
                        <option value="1">Active </option>
                        <option value="0">Inactive </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control tinymce" rows="3" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}" >
                    <label for="files">Upload Image</label> <br>
                    <input type="file" id="files" name="image" required="required">
                    <p class="help-block">Image size 300px X 300px</p>
                    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group">
                    <label>Selected Image</label> <br>
                    <img style="max-height: 300px;" class="img-responsive" id="image" />
                </div>
            </div>
        </div>
    </form>
</div>
@endsection