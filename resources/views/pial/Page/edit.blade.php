@extends('admin.layouts.mainlayout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h4 class="my-3">Edit Page </h4>
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
                        <label for="">Main Menu <span class="text-danger">*</span></label>
                        <select name="main_menu" class="form-control show-tick">
                            <option value="">-- Select --</option>
                            <option value="About_Us" {{ old('main_menu') == 'About_Us' ? 'selected' : '' }}>About_Us
                            </option>
                            <option value="Registration" {{ old('main_menu') == 'Registration' ? 'selected' : '' }}>Registration
                            </option>
                            <option value="Program" {{ old('main_menu') == 'Registration' ? 'selected' : '' }}>Program
                            </option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="event_title">Menu Name</label>
                        <input type="text" class="form-control" id="subtitle" name="menu_name" value="{{ $pagedata->menu_name }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="event_title">Menu url</label>
                        <input type="text" class="form-control" id="subtitle" name="menu_url" value="{{ $pagedata->menu_url }}" placeholder="https://myurlx.com"
                            required>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Layouts <span class="text-danger">*</span></label>
                        <select name="layout" class="form-control show-tick">
                            <option value="">-- Select --</option>
                            <option value="layout1" {{ old('layout') == 'layout1' ? 'selected' : '' }}>layout-1
                            </option>
                            <option value="layout2" {{ old('layout') == 'layout2' ? 'selected' : '' }}>layout-2
                            </option>
                            <option value="layout3" {{ old('layout') == 'layout3' ? 'selected' : '' }}>layout-3
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Contant</label>
                        <textarea id="summernote" class="form-control" placeholder="Write something"
                            name="contant">{{ $pagedata->contant }}</textarea>
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
