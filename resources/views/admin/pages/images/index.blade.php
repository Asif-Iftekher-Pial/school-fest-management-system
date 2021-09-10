@extends('admin.layouts.mainlayout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h3 class="my-3">Album Images List</h3>
        </div>
        <div class="col-md-6" style="margin-top:10px;">
            <form method="GET" action="{{ url('/admin/albumimages') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
                </div>
            </form>
        </div>
    </div>
    <a href="{{ url('/admin/albumimages/create') }}" title="Add Event"><button class="btn btn-success btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add New Image</button></a>

    <hr>
    <div class="row">
        <div class="col-md-10">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Serial No.</th>
                            <th>Album Title</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($images as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->Album->title }}</td>
                                <td>
                                    <img src="{{ asset('uploads/albums/'.$item->img_name) }}" alt="Album Image" style="max-height: 150px;">
                                </td>
                                
                                <td>  
                                    <form method="POST" action="{{ url('/admin/albumimages' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
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
            {!! $images->render() !!}
        </div>
    </div>
</div>

@endsection