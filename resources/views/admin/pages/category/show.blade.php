@extends('admin.layouts.dashboard') 

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>Events List</h1>
    </div>
    <div class="col-md-6" style="margin-top:10px;">
        <form method="GET" action="{{ url('/admin/events') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
            <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
            </div>
        </form>
    </div>
</div>
<a href="{{ url('/admin/events/create') }}" title="Add Event"><button class="btn btn-success btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add Event</button></a>

<hr>
<div class="row">
    <div class="col-md-8">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Event Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                @php 
                                    if($item->status >0){
                                        echo "Active";
                                    }else{
                                        echo"Inactive";
                                    }
                                @endphp
                            </td>
                            <td>
                                
                               @foreach ($item->Category as $citem )
                                   <p>{{ $citem->title }}</p>
                               @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection