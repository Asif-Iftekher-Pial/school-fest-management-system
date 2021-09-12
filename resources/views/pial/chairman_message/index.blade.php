@extends('admin.layouts.mainlayout')

@section('content')


    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h4 class="my-3">Chairman Message</h4>
                <hr>


            </div>
        </div>
        @if (\App\Missionvission::count() > 0)
            <hr>
            <figure class="text-center">
                <blockquote class="blockquote">
                    <p>Message</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    {{ $data->chair_message }}
                </figcaption>
            </figure>

            <hr>

            <div style="text-align: center">
                <img src="{{ asset('uploads/chairimage/' . $data->chair_image) }}" alt="Image" style="max-width: 200px">

            </div>


            <hr>

            <a href="{{ route('chairman.edit',$data->id) }}" title="Add Event"><button class="btn btn-success btn-sm"><i
                class="fa fa-plus" aria-hidden="true"></i> &nbsp; Update</button></a>

            {{-- <form method="POST" action="{{ url('/admin/chairman' . '/' . $data->id) }}" accept-charset="UTF-8"
                style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete Event"
                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                    Delete</button>
            </form> --}}


        @else

            <a href="{{ route('chairman.create') }}" title="Add Event"><button class="btn btn-success btn-sm"><i
                        class="fa fa-plus" aria-hidden="true"></i> &nbsp; Create Message</button></a>

            <h2 style="text-align: center">No Info added</h2>

        @endif


    </div>
@endsection
