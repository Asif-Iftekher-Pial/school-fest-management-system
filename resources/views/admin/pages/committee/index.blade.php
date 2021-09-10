@extends('admin.layouts.mainlayout')

@section('content')

<div class="container-fluid">
<div class="row">
    <div class="col-md-6">
        <h4 class="my-3">School Committee List</h4>
    </div>
    <div class="col-md-6" style="margin-top:10px;">
        <form method="GET" action="{{ url('/admin/committees') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
            <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
            </div>
        </form>
    </div>
</div>
<a href="{{ url('/admin/committees/create') }}" title="Add Event"><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Create New School Committee</button></a>

<hr>
<div class="row">
    <div class="col-md-10">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sl No.</th>
                        <th>Committee Title</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($committee as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                @php 
                                    if($item->type == 1){
                                        echo "Advisory Committee";
                                    }else{
                                        echo"Judgment Committee";
                                    }
                                @endphp
                            </td>
                            <td>                                
                                <a href="{{ url('/admin/committees/' . $item->id . '/edit') }}" title="Edit Event"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                
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