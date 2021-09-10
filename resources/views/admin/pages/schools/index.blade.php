@extends('admin.layouts.mainlayout')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<h4 class="my-3">Registered School List</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Sl No</th>
							<th>School Name</th>
							<th>Branch Name</th>
							<th>Email Address</th>
							<th>Mobile Number</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
					    @if(count($schools)>0)
					    @foreach($schools as $item)
					    <tr>
					        <td>{{ $loop->iteration }}</td>
					        <td>{{ $item->name }}</td>
					        <td>{{ $item->email }}</td>
					        <td>{{ $item->mobile }}</td>
					        <td {{ $item->status=='Inactive' ? 'style=color:red' : ''}}> {{ $item->status }}</td>
					        <td>
					            <a class="btn btn-sm btn-success" href="{{ url('/admin/school/'.$item->id.'/edit') }}"><i class="fas fa-edit"></i></a>
					            <a class="btn btn-sm btn-primary" href="{{ url('/admin/school/profile/'.$item->id) }}">View Profile</a>
					        </td>
					    </tr>
					    @endforeach
					    @else
					    <tr>
					        <td colspan="6" class="text-center">No Data Found</td>
					    </tr>
					    @endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection