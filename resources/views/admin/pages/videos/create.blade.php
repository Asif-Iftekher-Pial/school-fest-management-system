@extends('admin.layouts.mainlayout')

@section('content')

<div class="container-fluid">

<h4 class="my-3">Add New Video</h4>
<hr>
    <form method="POST" action="{{ route('videogallery.store') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                    <label for="event_title">Video Title</label>
                    <input type="text" class="form-control" id="event_title" name="title" placeholder="Video Title" required >
                </div>
                <div class="form-group">
                    <label for="video_url">Video embed link</label>
                    <input type="text" class="form-control" id="video_url" name="video_url" placeholder="Youtube video embed link" required >
                </div>
                <div class="form-group">
                    <label for="sl_date">Serial Date</label>
                    <input type="date" class="form-control" id="sl_date" name="sl_date" required >
                </div>
                
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            <div class="col-md-6">
                
            </div>
        </div>
    </form>
</div>
@endsection