@extends('admin.layouts.mainlayout')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<h4 class="my-3">School student group list</h4>
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
							<th>Group Title</th>
							<th>Category title</th>
							<th>Group title</th>
						</tr>
					</thead>
					<tbody>
					    @if(count($data)>0)
					    @foreach($data as $item)
					    <tr>
					        <td>{{ $loop->iteration }}</td>
					        <td>{{ $item->user->name }}</td>
					        <td>{{ $item->user->branch_name }}</td>
					        <td>{{ $item->title }}</td>
					        <td>{{ $item->category->title }}</td>
					        <td>{{ $item->group->title }}</td>
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