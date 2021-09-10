@extends('admin.layouts.dashboard') 

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>Student Information Details</h1>
    </div>
    <div class="col-md-6" style="margin-top:10px;">
        
    </div>
</div>
<a href="{{ url('/admin/students') }}" title="Add Event"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</button></a>

<hr>
<div class="row">
    <div class="col-md-8">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td class="col-md-4">School Name</td>
                        <td> {{ $students->School->school_name  }}</td>
                    </tr>
                    <tr>
                        <td>Branch Name</td>
                        <td> {{ $students->School->school_branch_name }}</td>
                    </tr>
                    <tr>
                        <td>Student Name</td>
                        <td>{{ $students->name }}</td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>{{ $students->Category->title }}</td>
                    </tr>
                    <tr>
                        <td>Group Name</td>
                        <td>{{ $students->Group->title }}</td>
                    </tr>
                    <tr>
                        <td>Student Mobile Number</td>
                        <td>{{ $students->mobile }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $students->email }}</td>
                    </tr>
                    <tr>
                        <td>School Status</td>
                        <td>
                            @php 
                                if($students->status >0){
                                    echo "Active";
                                }else{
                                    echo"Inactive";
                                }
                            @endphp
                        
                        </td>
                    </tr>
                        
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection