@extends('admin.layouts.mainlayout')

@section('content')

 <div class="container-fluid">

<h4 class="my-3">Edit Group Info</h4>
<a class="btn btn-primary btn-sm my-3" href="{{ route('groups.index') }}">Back</a>
<hr>
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="{{ url('/admin/groups/'. $group->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="status">Event Title</label>
                <select class="form-control" name="event_id">
                    <option selected disabled>--Select Option--</option>
                    @foreach($events as $item)
                        @if($group->event_id == $item->id)
                        <option selected value="{{$item->id }}">{{ $item->title }}</option>
                        @endif
                        <option value="{{$item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status">Category Title</label>
                <select class="form-control" name="category_id">
                    <option selected disabled>--Select Option--</option>
                    @foreach($category as $item)
                        @if($group->category_id == $item->id)
                        <option selected value="{{$item->id }}">{{ $item->title }}</option>
                        @endif
                        <option value="{{$item->id }}">{{ $item->title }}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="event_title">Group Name</label>
                <input type="text" class="form-control" id="event_title" name="title" value="{{ $group->title }}" required >
            </div>
            <div class="form-group">
                <label for="event_title">Class Name</label>
                <input type="text" class="form-control" id="event_title" name="class_name" value="{{ $group->class_name }}" required >
            </div>
            <div class="form-group">
                <label for="event_title">Student Number</label>
                <input type="text" class="form-control" id="event_title" name="student_amount" value="{{ $group->student_amount }}" required >
            </div>
            <div class="form-group">
                <label for="status">Group Status</label>
                <select class="form-control" name="status">
                    @php if($group->status >0){ @endphp
                            <option disabled>--Select Option--</option>
                            <option selected value="1">Active Event</option>
                            <option value="0">Inactive Event</option>
                    @php }else{ @endphp
                            <option disabled>--Select Option--</option>
                            <option value="1">Active Event</option>
                            <option selected value="0">Inactive Event</option>
                    @php    }
                    @endphp
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" rows="5" name="description">{{ $group->description }}</textarea>
            </div>

              
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
</div>

@endsection