<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Lupa Password &mdash; BPR SAU</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/modules/jquery-selectric/selectric.css') }}">
    <link rel='shortcut icon' type='image/x-icon'
        href='../bpr_sau_dashboard8/gallery/cropped-surya-artha-utama-2.webp' />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/css/components.css') }}">
    <!-- Start GA -->

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
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="../bpr_sau_dashboard8/gallery/cropped-surya-artha-utama-2.webp" alt="logo"
                                width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Lupa Password</h4>
                            </div>

                            <div class="card-body">
                                <p class="text-muted text-dark">Kami Akan Mengirimkan Kode OTP untuk Mengatur Ulang
                                    Password Anda</p>
                                <form action="{{ route('resetPass') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="cif">CIF</label>
                                            <input id="cif" type="text"
                                                class="form-control @error('cif') is-invalid @enderror" name="cif"
                                                autofocus placeholder="Masukkan CIF" required>
                                            @error('cif')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nohp">Nomor HP</label>
                                            <input id="nohp" type="text"
                                                class="form-control @error('nohp') is-invalid @enderror" name="nohp"
                                                placeholder="Masukkan Nomor HP" required>
                                            @error('nohp')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Tempat Captcha --}}

                                    <div class="form-group">
                                        <button type="submit" id="send" class="btn btn-primary btn-lg btn-block">
                                            Kirim OTP
                                        </button>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-6">
                                            {!! NoCaptcha::display() !!}
                                            {!! NoCaptcha::renderJs() !!}
                                            @error('g-recaptcha-response')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </form>
                                <div style="text-align: center">
                                    <a href="{{ route('viewLogin') }}" class="ml-2">Sudah Punya Akun? Login</a>
                                </div>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; BPR. Surya Artha Utama
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ url('stisla/dist/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/modules/popper.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/modules/tooltip.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/modules/moment.min.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ url('stisla/dist/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ url('stisla/dist/assets/js/page/auth-register.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ url('stisla/dist/assets/js/scripts.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/js/custom.js') }}"></script>

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
    {{-- <script>
        $('#send').click(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route}}",
                data: "data",
                dataType: "dataType",
                success: function (response) {

                }
            });
        });
    </script> --}}
</body>

</html>
