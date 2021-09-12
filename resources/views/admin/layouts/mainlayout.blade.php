<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Krishan Bari, Online Shop" />
        <meta name="author" content="Md Khalid Hossain" />
        <title>Stem Fest | Dashboard</title>
        <link rel="icon" href="{{ asset('main/dist/images/logo.jpg') }}" type="image/gif" sizes="16x16">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('back/css/styles.css') }}" rel="stylesheet" />
        <!-- <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" /> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <style type="text/css">
            @import url('https://fonts.googleapis.com/css2?family=Manrope&display=swap');

            body{
                font-family: 'Manrope', sans-serif;
            }
        </style>
        <link rel="stylesheet" href="{{ asset('back/assets/summernote/summernote.css') }}">
        
    </head>
    <body class="sb-nav-fixed">
        
        @include('admin.partials.mainnavbar')

        <div id="layoutSidenav">
            @include('admin.partials.mainsidebar')
            <div id="layoutSidenav_content">
                <main>


        @yield('content')


                </main>
                @include('admin.partials.mainfooter')
            </div>
        </div>


       {{--   <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> --}}
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        {{-- <script src="{{ asset('back/js/scripts.js') }}"></script> --}}
      {{--   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> --}}
        {{-- <script src="{{ asset('back/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('back/assets/demo/chart-bar-demo.js') }}"></script> --}}
     {{--    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> --}}
        {{-- <script src="{{ asset('back/assets/demo/datatables-demo.js') }}"></script> --}}
        <script type="text/javascript">
        document.getElementById("files").onchange = function () {
        var reader = new FileReader();
        reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
        };
        </script>

        <script src="{{ asset('back/assets/summernote/summernote.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#summernote').summernote();
            });
        </script>

        @yield('java_script')

    </body>
</html>