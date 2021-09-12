@extends('admin.layouts.mainlayout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h4 class="my-3">Update Information</h4>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('chairman.update',$data->id) }}" accept-charset="UTF-8"
                    class="form-horizontal" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                   


                    <div class="form-group">
                        <label for="description">Message</label>
                        <textarea class="form-control" rows="5" name="chair_message" spellcheck="false">{{ $data->chair_message }}</textarea>
                    </div>
                    

                    <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                        <label for="files">Upload Slider Image</label> <br>
                        <input type="file" id="files" name="chair_image" required="required">
                        <p class="help-block">Image size 1920px X 700px</p>
                        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group">
                        <label>Selected Image</label> <br>
                        <img style="max-height: 300px;" class="img-responsive" id="image" />
                    </div>

                   
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection
