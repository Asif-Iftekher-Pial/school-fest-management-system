@extends('admin.layouts.mainlayout')

@section('content')

<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-6">
            <h4 class="my-3">Page template List</h4>
        </div>
        
    </div>
    <a href="{{ route('pageSetup.create') }}" title="Add Event"><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Add New Page</button></a>

    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Main Menu</th>
                            <th>Sub-Menu</th>
                            <th>Url</th>
                            <th>Layout</th>
                            <th>Contant</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pagedata as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->main_menu }}</td>
                                <td>{{ $item->menu_name }}</td>
                                <td>{{ $item->menu_url }}</td>
                                <td>{{ $item->layout }}</td>
                                <td>{{ $item->contant }}</td>
                                <td>
                                    <img src="{{ asset('uploads/pages/'.$item->image) }}" alt="Album Image" style="max-height: 60px;">
                                </td>
                                <td>
                                    @php 
                                        if($item->status > 0){
                                            echo "Active";
                                        }else{
                                            echo "Inactive";
                                        }
                                    @endphp
                                </td>
                                <td>                                
                                    <a href="{{ url('/admin/pageSetup/' . $item->id . '/edit') }}" title="Edit Event"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                    
                                    
                                    <form method="POST" action="{{ url('/admin/pageSetup' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Event" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pagedata->links() }}
            </div>
        </div>
    </div>

</div>
@endsection