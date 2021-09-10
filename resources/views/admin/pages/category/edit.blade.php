@extends('admin.layouts.mainlayout')

@section('content')

<div class="container-fluid">

<h4 class="my-3">Edit Category Info</h4>

<a class="btn btn-info btn-sm my-3" href="{{ route('category.index') }}">Back</a>
<hr>
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="{{ url('/admin/category/'.$category->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="event_title">Category Title</label>
                <input type="text" class="form-control" id="event_title" name="title" value="{{ $category->title }}" required >
            </div>
            
            <div class="form-group">
                <label for="status">Category Status</label>
                <select class="form-control" name="status">
                    @php if($category->status >0){ @endphp
                            <option disabled>--Select Option--</option>
                            <option selected value="1">Active category</option>
                            <option value="0">Inactive category</option>
                    @php }else{ @endphp
                            <option disabled>--Select Option--</option>
                            <option value="1">Active category</option>
                            <option selected value="0">Inactive category</option>
                    @php    }
                    @endphp
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" rows="5" name="description">{{ $category->description }}</textarea>
            </div>

              
            <button type="submit" class="btn btn-primary btn-sm">Update</button>
        </form>
    </div>
</div>

</div>
@endsection