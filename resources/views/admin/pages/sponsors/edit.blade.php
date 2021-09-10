@extends('admin.layouts.mainlayout')

@section('content')

<div class="container-fluid">

<h4 class="my-3">Edit Sopnsor  Info</h4>
<hr>
    <form method="POST" action="{{ url('/admin/sponsors/'. $sponsor->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="row">
    
            <div class="col-md-6">
            
                <div class="form-group">
                    <label for="event_title">Title</label>
                    <input type="text" class="form-control" id="event_title" name="title" value="{{ $sponsor->title }}" required >
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status">
                        @php if($sponsor->status >0){ @endphp
                                <option disabled>--Select Option--</option>
                                <option selected value="1">Active</option>
                                <option value="0">Inactive</option>
                        @php }else{ @endphp
                                <option disabled>--Select Option--</option>
                                <option value="1">Active</option>
                                <option selected value="0">Inactive</option>
                        @php    }
                        @endphp
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control tinymce" rows="3" name="description">{!! $sponsor->description  !!}
                    </textarea>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}" >
                    <label for="files">Upload Image</label>
                    <input type="file" id="files" name="image">
                    <p class="help-block">Image size 300px X 300px</p>
                    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group">
                    <label>Selected Image</label> <br>
                    <img style="max-height: 300px;" class="img-responsive" id="image" src="{{ asset('uploads/sponsors/'.$sponsor->sponsors_image) }}" />
                </div>
            </div>
   
        </div>
    </form>
</div>

@endsection