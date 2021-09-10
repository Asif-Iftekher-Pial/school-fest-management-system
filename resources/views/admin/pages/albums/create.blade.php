@extends('admin.layouts.mainlayout')

@section('content')

<div class="container-fluid">

<h4 class="my-3">Create New Photo Album</h4>
<hr>
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="{{ url('/admin/albums') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="event_title">Album Title</label>
                <input type="text" class="form-control" id="event_title" name="title" placeholder="Album Title" required >
            </div>
            <div class="form-group">
                <label for="event_title">Album Date</label>
                <input type="date" class="form-control" id="event_title" name="date" placeholder="Event Date" required >
            </div>
            <div class="form-group">
                <label for="status">Album Type</label>
                <select class="form-control" name="type" required="required">
                    <option selected disabled>--Select Option--</option>
                    <option value="1">Photo Gallery</option>
                    <option value="2">Student Gallery</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" rows="5" name="description"></textarea>
            </div>

              
            <button type="submit" class="btn btn-success">Save Album</button>
        </form>
    </div>
</div>
</div>

@endsection