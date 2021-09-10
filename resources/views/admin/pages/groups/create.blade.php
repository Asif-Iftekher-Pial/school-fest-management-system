@extends('admin.layouts.mainlayout')

@section('content')

 <div class="container-fluid">

<h4 class="my-3">Create New Group</h4>
<a class="btn btn-primary btn-sm my-3" href="{{ route('groups.index') }}">Back</a>
<hr>
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="{{ url('/admin/groups') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            
            <div class="form-group">
                <label for="status">Category Title</label>
                <select class="form-control" name="category_id">
                    <option selected disabled>--Select Option--</option>
                    @foreach($category as $item)
                        <option value="{{$item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="event_title">Group Name</label>
                <input type="text" class="form-control" id="event_title" name="title" placeholder="Group Name" required >
            </div>
            <div class="form-group">
                <label for="event_title">Class Name</label>
                <input type="text" class="form-control" id="event_title" name="class_name" placeholder="Class Limit " required >
            </div>
            <div class="form-group">
                <label for="event_title">Student Number</label>
                <input type="text" class="form-control" id="event_title" name="student_amount" placeholder="Number of Student Register" required >
            </div>
            <div class="form-group">
                <label for="status">Group Status</label>
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

              
            <button type="submit" class="btn btn-success btn-sm">Save Group</button>
        </form>
    </div>
</div>

</div>
@endsection