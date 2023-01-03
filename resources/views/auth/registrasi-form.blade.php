<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Registrasi Baru &mdash; BPR SAU</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/modules/jquery-selectric/selectric.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/css/components.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='../gallery/cropped-surya-artha-utama-2.webp' />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script> --}}

    <!-- Start GA -->
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
                            <img src="../gallery/cropped-surya-artha-utama-2.webp" alt="logo" width="100"
                                class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Registrasi Form</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('getRegisForm') }}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-10">
                                            <label for="cif">CIF</label><br>
                                            @error('cif')
                                                <small>{{ $message }}</small>
                                            @enderror
                                            <input id="cif" type="text"
                                                class="form-control @error('cif') is-invalid @enderror" name="cif"
                                                autofocus value="{{ $payload['cif'] }}" placeholder="Masukkan CIF"
                                                required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for=""></label>
                                            <button type="" id="cek"
                                                class="btn btn-primary btn-lg btn-block"> Cek
                                            </button>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nama">Nama</label>
                                            <input id="nama" readonly type="text" class="form-control"
                                                name="nama" autofocus required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nohp">Nohp</label>
                                            <input id="nohp" type="text" class="form-control" name="nohp"
                                                value="{{ $payload['nohp'] }}" readonly autofocus required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="last_name">Alamat</label>
                                            <input id="alamat" readonly type="text" class="form-control"
                                                name="alamat" required>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="cif">Password</label>
                                            <br>
                                            @error('password')
                                                <small>{{ $message }}</small>
                                            @enderror
                                            <div class="input-group">
                                                <input type="password" id="pass" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="Masukkan Password" required>

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
                                            <label for="cif">Konfirmasi Password</label>
                                            <br>
                                            @error('password2')
                                                <small>{{ $message }}</small>
                                            @enderror
                                            <div class="input-group">
                                                <input type="password" id="pass2" name="password2"
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

                                        <input type="text" class="form-control" autofocus="" name="cif"
                                            hidden value="{{ $payload['cif'] }}" />
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- captcha --}}
                        <div class="simple-footer">
                            Copyright &copy; BPR. Surya Artha Utama
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
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
    {{-- <script>
        // membuat fungsi change
        function change() {

            // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password
            var x = document.getElementById('pass2').type;

            //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
            if (x == 'password') {

                //ubah form input password menjadi text
                document.getElementById('pass2').type = 'text';

                //ubah icon mata terbuka menjadi tertutup
                document.getElementById('mybutton2').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                            <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                            <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                            </svg>`;
            } else {

                //ubah form input password menjadi text
                document.getElementById('pass2').type = 'password';

                //ubah icon mata terbuka menjadi tertutup
                document.getElementById('mybutton2').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                            <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                            </svg>`;
            }
        }
    </script> --}}
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
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#cek").click(function(e) {
            e.preventDefault();
            var cif = $("#cif").val();
            var nohp = "{{ $payload['nohp'] }}";

            $.ajax({
                type: 'POST',
                url: "{{ route('regisCekApi') }}",
                data: {
                    cif: cif,
                    nohp: nohp
                },
                success: function(data) {
                    document.getElementById('nama').value = data['data']['nama'];
                    document.getElementById('alamat').value = data['data']['alamat'];
                }
                // alert('Data Tidak Ditemukan !');
                // window.location = "new-registration";
            });
        });
    </script>
</body>

</html>
