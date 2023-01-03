<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Monitoring &mdash; BPR SAU</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet"
        href="{{ url('stisla/dist/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ url('stisla/dist/assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet"
        href="{{ url('stisla/dist/assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet"
        href="{{ url('stisla/dist/assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ url('stisla/dist/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/css/components.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='../gallery/cropped-surya-artha-utama-2.webp' />


    <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="{{ url('stisla/dist') }}/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ url('stisla/dist') }}/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css"> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>

    @section('css')
    @show
    @yield('css')
</head>

<body class="sidebar-mini">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('layout.header')
            @include('layout.sidebar')
            @yield('content')
            @include('layout.footer')
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- General JS Scripts -->
    <script src="{{ url('stisla/dist/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/modules/popper.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/modules/tooltip.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/modules/moment.min.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ url('stisla/dist/assets/modules/jquery.sparkline.min.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/modules/chart.min.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    {{-- <script src="{{ url('stisla/assets/modules/cleave-js/dist/cleave.min.js') }}"></script>
    <script src="{{ url('stisla/assets/modules/cleave-js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ url('stisla/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ url('stisla/assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ url('stisla/assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ url('stisla/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ url('stisla/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ url('stisla/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ url('stisla/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script> --}}

    <!-- Page Specific JS File -->
    {{-- <script src="{{ url('stisla/dist/assets/js/page/index.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/js/page/forms-advanced-forms.js') }}"></script> --}}

    <!-- Template JS File -->
    <script src="{{ url('stisla/dist/assets/js/scripts.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/js/custom.js') }}"></script>


    <script src="{{ url('stisla/dist') }}/assets/modules/datatables/datatables.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js">
    </script>
    <script src="{{ url('stisla/dist') }}/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/jquery-ui/jquery-ui.min.js"></script>



    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script> --}}

    <!-- Page Specific JS File -->
    <script src="{{ url('stisla/dist') }}/assets/js/page/modules-datatables.js"></script>

    @if (Session::has('error'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            toastr['error']("{{ session('error') }}", 'Error !', {
                closeButton: true,
                tapToDismiss: false,
                timeOut: 5000,
            });
        </script>
    @endif
    @if (Session::has('warning'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            toastr['warning']("{{ session('warning') }}", 'Warning !', {
                closeButton: true,
                tapToDismiss: false,
                timeOut: 5000,
            });
        </script>
    @endif
    @if (Session::has('success'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            toastr['success']("{{ session('success') }}", 'Sukses !', {
                closeButton: true,
                tapToDismiss: false,
                timeOut: 5000,
            });
        </script>
    @endif

    {{-- @section('js') --}}
@show
@yield('js')
</body>

</html>
