@extends('admin.layouts.mainlayout')

@section('content')

<div class="container-fluid">

<h4 class="my-3">Create New Category</h4>
<hr>
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="{{ url('/admin/category') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="event_title">Category Title</label>
                <input type="text" class="form-control" id="event_title" name="title" placeholder="Category Title" required >
            </div>
            
            <div class="form-group">
                <label for="status">Category Status</label>
                <select class="form-control" name="status">
                    <option selected disabled>--Select Option--</option>
                    <option value="1">Active </option>
                    <option value="0">Inactive </option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" rows="5" name="description"></textarea>
            </div>

              
            <button type="submit" class="btn btn-primary btn-sm">Save Category</button>
        </form>
    </div>
</div>

</div>

@endsection