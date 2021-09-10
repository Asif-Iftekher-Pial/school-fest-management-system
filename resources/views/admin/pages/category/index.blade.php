@extends('admin.layouts.mainlayout')

@section('content')

<div class="container-fluid">
<div class="row">
    <div class="col-md-6">
        <h4 class="my-3">Category List</h4>
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
<a href="{{ url('/admin/category/create') }}" title="Add Event"><button class="btn btn-success btn-sm my-3"><i class="fa fa-plus" aria-hidden="true"></i> Add Category</button></a>

<hr>
<div class="row">
    <div class="col-md-10">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
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
                                <a href="{{ url('/admin/category/' . $item->id . '/edit') }}" title="Edit Event"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                @php if($item->status >0){ @endphp
                                        <form method="POST" action="{{ url('/admin/category/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('PATCH') }}
                                            {{ csrf_field() }}
                                            <input style="display: none;" name="status" value="0"/>
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Event" onclick="return confirm(&quot;Confirm Inactive?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Inactive</button>
                                        </form>
                                @php }else{ @endphp
                                        <form method="POST" action="{{ url('/admin/category/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('PATCH') }}
                                            {{ csrf_field() }}
                                            <input style="display: none;" name="status" value="1"/>
                                            <button type="submit" class="btn btn-success btn-sm" title="Delete Event" onclick="return confirm(&quot;Confirm Active?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Active</button>
                                        </form>
                                @php    }
                                @endphp
                                {{-- <form method="POST" action="{{ url('/admin/category' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-xs" title="Delete Event" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                </form> --}}
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