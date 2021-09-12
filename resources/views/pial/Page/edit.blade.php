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
                <form method="POST" action="{{ route('pageSetup.update', $pagedata->id) }}" accept-charset="UTF-8"
                    class="form-horizontal" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="event_title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $pagedata->title }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="event_title">Sub-Title</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle"
                            value="{{ $pagedata->subtitle }}" required>
                    </div>


                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" rows="5" name="description" spellcheck="false"></textarea>
                    </div>



                    <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                        <label for="files">Upload Slider Image</label> <br>
                        <input type="file" id="files" name="image" value="{{ $pagedata->image }}" required="required">
                        <p class="help-block">Image size 1920px X 700px</p>
                        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group">
                        <label>Selected Image</label> <br>
                        <img style="max-height: 300px;" class="img-responsive" id="image" />
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status">
                            @php if($pagedata->status >0){ @endphp
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

                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection
