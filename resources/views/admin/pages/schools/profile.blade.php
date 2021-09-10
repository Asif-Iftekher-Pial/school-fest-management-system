@extends('admin.layouts.mainlayout')

@section('title', 'School Profile')

@section('content')
        
    <div class="container-fluid">
        <h1 class="mt-4">School Profile</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></li>
        </ol>
        <div class="row">
            <div class="col-12">
               {{--  <a class="btn btn-sm btn-success my-3" href="{{ url('admin/school/students/'.$school->id) }}">Student Task List</a> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-8">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th width="40%">School Name</th>
                        <td>{{ $school->name  }}</td>
                    </tr>
                    <tr>
                        <th width="40%">School Branch Name</th>
                        <td>{{ $school->branch_name  }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $school->email }}</td>
                    </tr>
                    <tr>
                        <th>School Phone Number</th>
                        <td>{{ $school->mobile }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $school->status }}</td>
                    </tr>
                    
                    <tr>
                        <th>Coordinator Name</th>
                        <td>{{ $profile->coordinator ?? 'N/A' }}</td>
                    </tr>
                    {{-- <tr>
                        <th>Coordinator Mobile Number</th>
                        <td>{{ $profile->schoolprofile->mobile_number }}</td>
                    </tr>
                    <tr>
                        <th>School Phone Number</th>
                        <td>{{ $profile->schoolprofile->school_phone }}</td>
                    </tr>
                    <tr>
                        <th>School Address</th>
                        <td>{{ $profile->schoolprofile->school_address }}</td>
                    </tr> --}}
                </table>
            </div>
            <div class="col-12 col-sm-4">
                <h4 class="text-center">School Logo</h4>
                <img class="img-fluid d-block mx-auto" src="{{ asset('uploads/profiles/'.$profile->images) }}" alt="" style="max-height: 200px">
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-12">
                <h5 class="my-3">Register Student List</h5>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <th>Sl No.</th>
                        <th>Student Name</th>
                        <th>Student Code</th>
                        <th>Class </th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Category Title</th>
                        <th>Group Name</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach($students as $stu)
                        <tr>
                            <td>{{  $loop->iteration  }}</td>
                            <td>{{ $stu->name }}</td>
                            <td>{{ $stu->code }}</td>
                            <td>{{ $stu->class }}</td>
                            <td>{{ $stu->mobile }}</td>
                            <td>{{ $stu->email }}</td>
                            <td>{{ $stu->category->title }}</td>
                            <td>{{ $stu->group->title }}</td>
                            <td>{{ $stu->status == '1'? 'Active': 'Inactive' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> --}}
    </div>                

@endsection

