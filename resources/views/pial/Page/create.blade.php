@extends('admin.layouts.mainlayout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h4 class="my-3">Add Page template</h4>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('pageSetup.store') }}" accept-charset="UTF-8"
                    class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="event_title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                    </div>

                    <div class="form-group">
                        <label for="event_title">Sub-Title</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Sub-Title"
                            required>
                    </div>


                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" rows="5" name="description" spellcheck="false"></textarea>
                    </div>



                    <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                        <label for="files">Upload Slider Image</label> <br>
                        <input type="file" id="files" name="image" required="required">
                        <p class="help-block">Image size 1920px X 700px</p>
                        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group">
                        <label>Selected Image</label> <br>
                        <img style="max-height: 300px;" class="img-responsive" id="image" />
                    </div>

                    <div class="form-group">
                        <label for="">Status</label>
                        <select class="form-control " name="status" required="required">
                            <option value="">Select a option</option>
                            <option selected="">Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-success">Save Images</button>
                </form>
            </div>
        </div>
    </div>

@endsection
