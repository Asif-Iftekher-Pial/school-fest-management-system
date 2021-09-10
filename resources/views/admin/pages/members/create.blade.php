@extends('admin.layouts.mainlayout')

@section('content')

<h1>Add New School Committee Member</h1>
<hr>
<div class="row">
    <form method="POST" action="{{ url('/admin/members') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row" >
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Committee Type</label>
                    <select class="form-control" name="committee_id" required="required">
                        <option selected disabled>--Select Option--</option>
                        @foreach($committee as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="event_title">Member Name</label>
                    <input type="text" class="form-control" id="event_title" name="member_name" placeholder="Member Name" required >
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" rows="5" name="description"></textarea>
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}" >
                    <label for="files">Member Image</label>
                    <input type="file" id="files" name="image" required="required">
                    <p class="help-block">Image size 250px X 350px</p>
                    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group">
                    <label>Selected Image</label>
                    <img style="max-height: 300px;" class="img-responsive" id="image" />
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        
    </form>
</div>


@endsection