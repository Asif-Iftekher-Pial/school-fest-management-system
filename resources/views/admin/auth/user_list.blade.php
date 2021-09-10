@extends('admin.layouts.mainlayout')

@section('content')
        
    <div class="container-fluid">

        <h2 class="mt-4" style="text-decoration: underline;">Admin User List</h2>
        
            @if ($message = Session::get('success'))
            <hr>
               <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{{ $message }}</strong>
               </div>
               <br>
            <hr>
            @endif
        
        

        <div class="card mb-4">
            {{-- <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div> --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                              <th scope="col">Sl No</th>
                              <th scope="col">Full Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Mobile</th>
                              <th scope="col">User Type</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">Sl No</th>
                                <th scope="col">Full Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Mobile</th>
                              <th scope="col">User Type</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->mobile }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td {{ $item->status=='Inactive' ? 'style=color:red' : ''}}>{{ $item->status }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ url('/admin/user/'.$item->id.'/edit') }}"><i class="fas fa-edit"></i></a>                                        
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

