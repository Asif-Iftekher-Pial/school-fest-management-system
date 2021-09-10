@extends('admin.layouts.mainlayout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h4 class="my-3">Video Gallery List</h4>
        </div>
        <div class="col-md-6" style="margin-top:10px;">
            {{-- <form method="GET" action="{{ url('/admin/members') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
                </div>
            </form> --}}
        </div>
    </div>
    <a href="{{ route('videogallery.create') }}" title="Add Event"><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Add New Video</button></a>

    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Title</th>
                            <th>Video Url</th>
                            <th>Sl Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($videos as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{!! $item->video_url !!}</td>
                                <td>{{ $item->sl_date }}</td>
                                
                                <td>                                
                                    
                                    <form method="POST" action="{{ route('videogallery.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete video" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $sponsor->links() }} --}}
            </div>
        </div>
    </div>

</div>
@endsection