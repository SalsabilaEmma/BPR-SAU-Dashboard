<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Lupa Pin &mdash; BPR SAU</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/modules/jquery-selectric/selectric.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/css/components.css') }}">
    <link rel='shortcut icon' type='image/x-icon'
        href='../bpr_sau_dashboard8/gallery/cropped-surya-artha-utama-2.webp' />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

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
                            <div class="card-body">
                                <form method="POST" action="{{ route('getOtpPin') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <div class="py-4 px-3">
                                                <h5 class="m-0">Kode OTP Reset PIN</h5><span
                                                    class="mobile-text">Masukkan 4
                                                    Digit Kode OTP yang anda dapatkan dari Whatsapp</span>
                                                <div class="d-flex flex-row mt-5">
                                                    <input type="text" class="form-control" autofocus=""
                                                        name="cif" hidden value="{{ $payload['cif'] }}" />
                                                    <input type="text" class="form-control" autofocus=""
                                                        name="nohp" hidden value="{{ $payload['nohp'] }}" />
                                                    <input required type="text"
                                                        class="form-control @error('otp') is-invalid @enderror"
                                                        autofocus="" name="otp"
                                                        placeholder="Masukkan Kode OTP" /><br>
                                                </div>
                                                @error('otp')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                                {{-- <div class="text-center mt-5">
                                                    <span class="d-block mobile-text">Don't receive the code?</span>
                                                    <span class="font-weight-bold text-danger cursor">
                                                        <a href="" id="resent"> Resend</a>
                                                    </span>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="form-group col-6 text-center py-4"><br><br><br>
                                            <h5>Sisa Waktu Verifikasi</h5><br>
                                            <h5 id="countdown"></h5>
                                        </div>
                                    </div>

                                    {{-- Tempat Captcha --}}

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Verifikasi
                                        </button>
                                    </div>
                                </form>
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
    <script>
        let timerOn = true;

        function timer(remaining) {
            var m = Math.floor(remaining / 60);
            var s = remaining % 60;
            m = m < 10 ? "0" + m : m;
            s = s < 10 ? "0" + s : s;
            document.getElementById("countdown").innerHTML = ` ${m} : ${s}`;
            remaining -= 1;
            if (remaining >= 0 && timerOn) {
                setTimeout(function() {
                    timer(remaining);
                }, 1000);
                document.getElementById("resend").innerHTML = `
      `;
                return;
            }
            if (!timerOn) {
                return;
            }
            alert('Timeout for otp');
            window.location = "new-registration";

            //     document.getElementById("resend").innerHTML = `Don't receive the code?
        // <span class="font-weight-bold text-color cursor" onclick="timer(60)">Resend
        // </span>`;
        }
        timer(180);
        // timer(60);
    </script>
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
</body>

</html>
