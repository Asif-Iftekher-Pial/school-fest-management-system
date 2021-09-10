@extends('admin.layouts.mainlayout')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <h4 class="my-3">Add Image To Photo Album</h4>
            <hr>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ url('/admin/albumimages') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <label for="status">Select Album</label>
                    <select class="form-control" name="album_id">
                        <option selected disabled>--Select Option--</option>
                        @foreach($album as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>           
                <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}" >
                    <label for="files">Upload Album Image</label> <br>
                    <input type="file" id="files" name="image" required="required">
                    <br>
                    <p class="help-block">Image size 600px X 400px</p>
                    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group">
                    <label>Selected Image</label> <br>
                    <img style="max-height: 300px;" class="img-responsive" id="image" />
                </div>
                

                  
                <button type="submit" class="btn btn-success">Save Images</button>
            </form>
        </div>
    </div>
</div>

@endsection