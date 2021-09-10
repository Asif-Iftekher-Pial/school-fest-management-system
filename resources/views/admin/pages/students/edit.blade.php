@extends('admin.layouts.dashboard') 

@section('content')

<h1>Edit Participant Information</h1>
<hr>
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="{{ url('/admin/students/' . $student->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}

            <div class="form-group">
                <label for="status">Event</label>
                <select class="form-control" name="event_id">
                    @foreach($event as $item)
                        <option value="{{$item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status">School Name</label>
                <select class="form-control" name="school_id">
                    {{-- <option selected disabled>--Select Option--</option> --}}
                    @foreach($schools as $item)

                    @if( $item->id == $student->id)
                        <option selected value="{{$item->id }}">{{ $item->school_name }} ({{ $item->school_branch_name }})</option>
                    @endif
                        <option value="{{$item->id }}">{{ $item->school_name }} ({{ $item->school_branch_name }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="event_title">Participant Name</label>
                <input type="text" class="form-control" id="event_title" name="name" value="{{ $student->name }}" required >
            </div>
            <div class="form-group">
                <label for="event_title">Category Name</label>
                <select class="form-control demo2" name="category_id">
                    {{-- <option selected disabled="disabled"> --select an option-- </option> --}}
                    @foreach($category as $item)

                    @if($item->id == $student->category_id)
                        <option selected value="{{$item->id }}">{{ $item->title }}</option>
                    @endif
                        <option value="{{$item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="event_title">Group Name</label>
                    <select class="form-control demo3 demo4 " name="group_id">
                      {{--   <option selected disabled="disabled"> --select an option-- </option> --}}
                    </select>
            </div>
            
            
            <div class="form-group">
                <label for="event_title">Class</label>
                    <select class="form-control demo5 " name="class">
                      {{--   <option selected disabled="disabled"> --select an option-- </option> --}}
                    </select>
            </div>
            <div class="form-group">
                <label for="event_title">Participant Mobile Number</label>
                <input type="text" class="form-control" id="event_title" name="mobile" value="{{ $student->mobile }}" required >
            </div>
            <div class="form-group">
                <label for="event_title">Participant Email</label>
                <input type="text" class="form-control" id="event_title" name="email" value="{{ $student->email }}" required >
            </div>
            
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status">
                    @php if($student->status >0){ @endphp
                            <option disabled>--Select Option--</option>
                            <option selected value="1">Active </option>
                            <option value="0">Inactive </option>
                    @php }else{ @endphp
                            <option disabled>--Select Option--</option>
                            <option value="1">Active </option>
                            <option selected value="0">Inactive </option>
                    @php    }
                    @endphp
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>



<script>
        $(document).ready(function(){
            $(document).on('change', '.demo2', function(){
                // console.log('It is ok');
                var category_id = $(this).val();
                var opp= " ";
                $.ajax({
                type:'get',
                url:'{{ url('/admin/groups/getgroups')}}',
                data:{ 'id' : category_id},
                success: function(data){
                    opp+= '<option value="0" selected disabled >--select an option-- </option>';
                     for (var i = 0; i < data.length; i++) {
                        opp+= '<option value="'+ data[i].id +'">'+ data[i].title + '</option>';
                        }
                     $('.demo3').html(opp);
                },
                error:function(){

                }
            });
        });
    });

    $(document).ready(function(){
            $(document).on('change', '.demo4', function(){
                // console.log('It is ok');
                var group_id = $(this).val();
                var oppn= " ";
                $.ajax({
                type:'get',
                url:'{{ url('/admin/groups/getclass')}}',
                data:{ 'id' : group_id},
                success: function(data){
                    var opp = "";
                    for (var i = 0; i < data.length; i++) {
                        opp+=  data[i].class_name;
                    }      
                    var array = opp.split(',');

                    oppn+= '<option value="0" selected disabled >--select an option-- </option>';
                     for (var i = 0; i < array.length; i++) {
                        oppn+= '<option value="'+ array[i] +'">'+ array[i]  + '</option>';
                        }
                     $('.demo5').html(oppn);
                },
                error:function(){

                }
            });
        });
    });
</script>

@endsection