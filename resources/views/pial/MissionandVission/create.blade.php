@extends('admin.layouts.mainlayout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h4 class="my-3">Create Information</h4>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('mission.store') }}" accept-charset="UTF-8"
                    class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                   


                    <div class="form-group">
                        <label for="description">Mission</label>
                        <textarea class="form-control" rows="5" name="mission" spellcheck="false"></textarea>
                    </div>
                    

                    <div class="form-group">
                        <label for="description">Vission</label>
                        <textarea class="form-control" rows="5" name="vission" spellcheck="false"></textarea>
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

                   
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>

@endsection
