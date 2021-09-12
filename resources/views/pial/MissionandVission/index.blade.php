@extends('admin.layouts.mainlayout')

@section('content')


    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h4 class="my-3">Mission and Vission</h4>
                <hr>


            </div>
        </div>
        @if (\App\Missionvission::count() > 0)
            <hr>
            <figure class="text-center">
                <blockquote class="blockquote">
                    <p>Our Mission</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    {{ $data->mission }}
                </figcaption>
            </figure>

            <hr>

            <figure class="text-center">
                <blockquote class="blockquote">
                    <p>Our Vission</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    {{ $data->vission }}
                </figcaption>
            </figure>

            <hr>

            <div style="text-align: center">
                <img src="{{ asset('uploads/missionvission/' . $data->image) }}" alt="Add Image" style="max-width: 200px">

            </div>


            <hr>

            <a href="{{ route('mission.edit', $data->id) }}" title="Add Event"><button class="btn btn-success btn-sm"><i
                        class="fa fa-plus" aria-hidden="true"></i> &nbsp; Update</button></a>

            {{-- <form method="POST" action="{{ url('/admin/mission' . '/' . $data->id) }}" accept-charset="UTF-8"
                style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete Event"
                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                    Delete</button>
            </form> --}}


        @else

            <a href="{{ route('mission.create') }}" title="Add Event"><button class="btn btn-success btn-sm"><i
                        class="fa fa-plus" aria-hidden="true"></i> &nbsp; Add Mission and Vission</button></a>

            <h2 style="text-align: center">No Info added</h2>

        @endif


    </div>
@endsection
