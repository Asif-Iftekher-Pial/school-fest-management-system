@extends('admin.layouts.mainlayout')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>School Committee Member List</h1>
    </div>
    <div class="col-md-6" style="margin-top:10px;">
        <form method="GET" action="{{ url('/admin/members') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
            <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
            </div>
        </form>
    </div>
</div>
<a href="{{ url('/admin/members/create') }}" title="Add Event"><button class="btn btn-success btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Add New Member</button></a>

<hr>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sl No.</th>
                        <th>Committee Title</th>
                        <th>Member Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->Committee->title }}</td>
                            <td>{{ $item->member_name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <img src="{{ asset('admin/uploads/'.$item->member_image) }}" alt="Album Image" style="max-height: 150px;">
                            </td>
                            <td>                                
                                <a href="{{ url('/admin/members/' . $item->id . '/edit') }}" title="Edit Event"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                <form method="POST" action="{{ url('/admin/members' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
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

@endsection