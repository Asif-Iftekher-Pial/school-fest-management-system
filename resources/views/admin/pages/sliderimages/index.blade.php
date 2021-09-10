@extends('admin.layouts.mainlayout')

@section('content')

<div class="container-fluid">
<div class="row">
    <div class="col-md-6">
        <h4 class="my-3">Slider Images List</h4>
    </div>
    <div class="col-md-6" style="margin-top:10px;">
        {{-- <form method="GET" action="{{ url('/admin/albumimages') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
            <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
            </div>
        </form> --}}
    </div>
</div>
<a href="{{ url('/admin/sliderimages/create') }}" title="Slider Image Add"><button class="btn btn-success btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add New Image</button></a>

<hr>
<div class="row">
    <div class="col-md-10">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Title</th>
                        <th>Sl date</th>
                        <th>Slider Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sliderimages as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->sl_date }}</td>
                            <td>
                                <img src="{{ asset('uploads/sliders/'.$item->sliderimage) }}" alt="Album Image" style="max-height: 150px;">
                            </td>
                            
                            <td>  
                                <form method="POST" action="{{ url('/admin/sliderimages' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-xs" title="Delete Event" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>
</div>
@endsection