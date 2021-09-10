@extends('admin.layouts.mainlayout')

@section('content')

<div class="container-fluid">
<h4 class="my-3">Edit Photo Album</h4>
<hr>
<a href="{{ url('/admin/albums') }}" title="Add Event"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; Back</button></a>
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="{{ url('/admin/albums/' . $album->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="album_title">Album Title</label>
                <input type="text" class="form-control" id="album_title" name="title" value="{{ $album->title }}" required >
            </div>
            <div class="form-group">
                <label for="date">Album Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $album->date }}" required >
            </div>
            <div class="form-group">
                <label for="status">Album Type</label>
                <select class="form-control" name="type" required="required">

                    @php if($album->type == 1){ @endphp
                        <option disabled>--Select Option--</option>
                        <option selected value="1">Photo Gallery</option>
                        <option value="2">Student Gallery</option>
                    @php }else{ @endphp
                        <option disabled>--Select Option--</option>
                        <option value="1">Photo Gallery</option>
                        <option selected value="2">Student Gallery</option>
                    @php    
                        }
                    @endphp

                    
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" rows="5" name="description">{{ $album->description }}</textarea>
            </div>

              
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>

</div>
@endsection