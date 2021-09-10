@extends('admin.layouts.dashboard') 
@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>Registered Chittagong Students List</h1>
    </div>
</div>
<a href="{{ url('/admin/students/create') }}" title="Add Students"><button class="btn btn-success btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add New Students</button></a>

<hr>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="schoolTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sl No.</th>
                        <th>Student Name</th>
                        <th>School Name</th>
                        <th>Branch Name</th>
                        <th>Category Name</th>
                        <th>Group Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $item)
                    @if($item->School->region == 2)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->School->school_name }}</td>
                        <td>{{ $item->School->school_branch_name }}</td>
                        <td>{{ $item->Category->title }}</td>
                        <td>{{ $item->Group->title }}</td>
                        <td>{{ $item->mobile }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @php if($item->status >0){ echo "Active"; }else{ echo"Inactive"; } 
                        @endphp
                        </td>
                        <td>
                            <a href="{{ url('/admin/students/' . $item->id ) }}" title="Student Show"><button class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Show</button></a>
                            <a href="{{ url('/admin/students/' . $item->id . '/edit') }}" title="Student Edit"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>                            @php if($item->status >0){ 
                        @endphp
                            <form method="POST" action="{{ url('/admin/students/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('PATCH') }} {{ csrf_field() }}
                                <input style="display: none;" name="status" value="0" />
                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Event" onclick="return confirm(&quot;Confirm Inactive?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Inactive</button>
                            </form>
                            @php }else{ 
                        @endphp
                            <form method="POST" action="{{ url('/admin/students/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('PATCH') }} {{ csrf_field() }}
                                <input style="display: none;" name="status" value="1" />
                                <button type="submit" class="btn btn-success btn-xs" title="Delete Event" onclick="return confirm(&quot;Confirm Active?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Active</button>
                            </form>
                            @php } 
                        @endphp {{--
                            <form method="POST" action="{{ url('/admin/events' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }} {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Event" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form> --}}
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- {!! $students->render() !!} --}}
    </div>
</div>
<style>
    table.dataTable {
        border-collapse: collapse;
    }

    table#schoolTable td {
        vertical-align: middle;
        text-align: center;
    }

    #schoolTable_filter input[type='search'] {
        border: 1px solid #dddddd;
    }

    table.dataTable thead th,
    table.dataTable thead td {
        border-bottom: 0;
    }
</style>
@endsection
 @push('scripts')
<script src="{{ asset('admin/js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/js/datatable/dataTables.buttons.min.js') }}"></script>
{{--
<script src="{{ asset('admin/js/datatable/buttons.flash.min.js.js') }}"></script> --}}
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="{{ asset('admin/js/datatable/jszip.min.js') }}"></script>
<script src="{{ asset('admin/js/datatable/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/js/datatable/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/js/datatable/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/js/datatable/buttons.print.min.js') }}"></script>

<script>
    $(document).ready(function () {
            $('#schoolTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    // 'pdf', // show all column during print
                    {
                        title: 'Registered Student List',
                        text: 'Export to PDF',
                        extend: 'pdfHtml5',
                        customize: function(doc) {
                            doc.content[1].margin = [ 90, 0, 90, 0 ] //left, top, right, bottom
                        },
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6,7]
                        },
                        orientation: 'landscape',
                        pageSize: 'LEGAL'
                    },
                    {
                        title: 'Registered Student List',
                        text: 'Export to Excel',
                        extend: 'excel',
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6,7]
                        }
                    }
                ],
                "columnDefs": [
                    { "orderable": false, "targets": [7] }, // by column index
                    // { "orderable": true, "targets": [1, 2, 3, 4, 5, 6] }
                ]
            });
        });

</script>

@endpush