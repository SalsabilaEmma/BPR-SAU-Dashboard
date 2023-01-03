<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Monitoring &mdash; BPR SAU</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/css/components.css">
    <link rel='shortcut icon' type='image/x-icon'
        href='../bpr_sau_dashboard8/gallery/cropped-surya-artha-utama-2.webp' />
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
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="../bpr_sau_dashboard8/gallery/cropped-surya-artha-utama-2.webp" alt="logo"
                                width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Lupa Password</h4>
                            </div>

                            <div class="card-body">
                                {{-- <p class="text-muted">Masukkan Password Baru</p> --}}
                                <form method="POST" action="{{ route('newPass') }}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="cif">Password Baru</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" autofocus="" name="cif"
                                                    hidden value="{{ $payload['cif'] }}" />
                                                <input type="text" class="form-control" autofocus="" name="nohp"
                                                    hidden value="{{ $payload['nohp'] }}" />

                                                <input type="password" id="pass" name="password_baru"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="Masukkan Password Baru" required>
                                                    @error('password')
                                                        <small>{{ $message }}</small>
                                                    @enderror

                                                <div class="input-group-append">
                                                    <!-- kita pasang onclick untuk merubah icon buka/tutup mata setiap diklik  -->
                                                    <span id="mybutton" onclick="change()" class="input-group-text">

                                                        <!-- icon mata bawaan bootstrap  -->
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                            class="bi bi-eye-fill" fill="currentColor"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                            <path fill-rule="evenodd"
                                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="cif">Konfirmasi Password Baru</label>
                                            <br>
                                            @error('password2')
                                                <small>{{ $message }}</small>
                                            @enderror
                                            <div class="input-group">
                                                <input type="password" id="pass2" name="password_baru2"
                                                    class="form-control @error('password2') is-invalid @enderror"
                                                    placeholder="Masukkan Ulang Password" required>

                                                {{-- <div class="input-group-append">
                                    <!-- kita pasang onclick untuk merubah icon buka/tutup mata setiap diklik  -->
                                    <span id="mybutton2" onclick="change()" class="input-group-text">

                                        <!-- icon mata bawaan bootstrap  -->
                                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                                            class="bi bi-eye-fill" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                            <path fill-rule="evenodd"
                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                        </svg>
                                    </span>
                                </div> --}}
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Tempat Captcha --}}

                                    {{-- <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                              <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                            </div>
                          </div> --}}

                                    <div class="form-group">

                                        {{-- <input type="text" class="form-control" autofocus="" name="cif"
                            hidden value="{{ $payload['cif'] }}" /> --}}
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="main-footer">
            <div class="footer-right">
                Copyright &copy; 2022
                <div class="bullet">BPR. Surya Artha Utama </div>
            </div>
        </footer>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ url('stisla/dist') }}/assets/modules/jquery.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/popper.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/tooltip.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/moment.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ url('stisla/dist') }}/assets/js/scripts.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/js/custom.js"></script>

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
    <script>
        // membuat fungsi change
        function change() {

            // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password
            var x = document.getElementById('pass').type;

            //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
            if (x == 'password') {

                //ubah form input password menjadi text
                document.getElementById('pass').type = 'text';

                //ubah icon mata terbuka menjadi tertutup
                document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                            <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                            <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                            </svg>`;
            } else {

                //ubah form input password menjadi text
                document.getElementById('pass').type = 'password';

                //ubah icon mata terbuka menjadi tertutup
                document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                            <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                            </svg>`;
            }
        }
    </script>
</body>

</html>
