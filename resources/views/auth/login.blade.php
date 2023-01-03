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
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/modules/bootstrap-social/bootstrap-social.css') }}">

    <!-- Template CSS -->
    {{-- <link rel="stylesheet" href="{{ url('stisla/dist/assets/css/style-em.css') }}"> --}}

    <link rel="stylesheet" href="{{ url('stisla/dist/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/css/components.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='../gallery/cropped-surya-artha-utama-2.webp' />
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
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
                    <div class="col-12 col-sm-6 col-lg-6">
                        <div class="card">
                            <form action="{{ route('login') }}" method="POST" autocomplete="off">
                                {{ csrf_field() }}
                                <div class="card-header">
                                </div>
                                <div class="card-body pb-0">
                                    <h4>Login</h4>
                                    <p class="text-muted"> </p>
                                    <div class="form-group">
                                        <label>USER ID</label>
                                        <div class="input-group text-dark">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-circle"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('cif') is-invalid @enderror" name="cif"
                                                placeholder="CIF" required autocomplete="false"><br>
                                            @error('cif')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label><br>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-lock"></i>
                                                </div>
                                            </div>
                                            <input name="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror text-dark"
                                                id="pass" placeholder="Password" required autocomplete="false">
                                            <div class="input-group-append">
                                                <!-- onclick untuk merubah icon buka/tutup mata setiap diklik  -->
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
                                    <div class="form-group mb-0 text-right">
                                        <a href="{{ route('viewResetPass') }}" class="ml-2">Lupa Password</a>
                                        <a class="ml-2">|</a>
                                        <a href="{{ route('resetPin') }}" class="ml-2">Lupa Pin</a>
                                    </div>
                                    {{-- <form> --}}
                                    @csrf
                                    {{-- batas recapt --}}
                                    <div class="form-group">
                                        <div class="text-center mt-4 mb-3">
                                            <div class="text-job text-muted">
                                                <h5>klik angka <span id="rc"></span></h5>
                                            </div>
                                        </div>
                                        <div class="row sm-gutters">
                                            <input type="hidden" name="captcha" id="c-captcha">
                                            <div class="col-2">
                                                <canvas class="cv" style="border:1px solid #767275;" width="50"
                                                    height="50" id="canvas_0" data-canvas="0"></canvas>
                                            </div>
                                            <div class="col-2">
                                                <canvas class="cv" style="border:1px solid #747672;" width="50"
                                                    height="50" id="canvas_1" data-canvas="1"></canvas>
                                            </div>
                                            <div class="col-2">
                                                <canvas class="cv" style="border:1px solid #747672;"
                                                    width="50" height="50" id="canvas_2"
                                                    data-canvas="2"></canvas>
                                            </div>
                                            <div class="col-2">
                                                <canvas class="cv" style="border:1px solid #747672;"
                                                    width="50" height="50" id="canvas_3"
                                                    data-canvas="3"></canvas>
                                            </div>
                                            <div class="col-2">
                                                <canvas class="cv" style="border:1px solid #747672;"
                                                    width="50" height="50" id="canvas_4"
                                                    data-canvas="4"></canvas>
                                            </div>
                                            <div class="col-1"
                                                style="display: flex; align-items: center; justify-content:center;">
                                                <div id="re_recapt" style="padding-left: 20px">
                                                    <i class="fas fa-sync-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    {{-- <input type="hidden" name="captcha" value="{{ request()->captcha }}" >  id="bt_check" --}}
                                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                                    {{-- name="submit" onclick="$.cardProgress('#sample-login', {dismiss: true,onDismiss: function() {alert('Dismissed :)')}});return false;" --}}
                                    <a href="{{ route('regisCek') }}" class="ml-2">Register Baru</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <div class="col-12 col-sm-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                {{-- <div class="mb-2 text-muted">Click the picture below to see the magic!</div> --}}
                                <h2>Selamat Datang</h2>
                                <h3>di Dashboard Monitoring <br> BPR Surya Artha Utama</h3>
                                <div class="chocolat-parent">
                                    <a href="../gallery/cropped-surya-artha-utama-2.webp" class="chocolat-image">
                                        <div data-crop-image="285">
                                            <img src="../gallery/cropped-surya-artha-utama-2.webp" alt="logo"
                                                width="300" class="shadow-light rounded-square">
                                        </div>
                                    </a>
                                </div><br><br><br><br><br><br>
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
    {{-- g-captcha --}}

    <script src='https://www.google.com/recaptcha/api.js'></script>
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

    {{-- <script src="{{ url('stisla/dist/assets/js/scripts-em.js') }}"></script> --}}

    <!-- General JS Scripts -->
    <script src="{{ url('stisla/dist/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/modules/popper.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/modules/tooltip.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/modules/moment.min.js') }}"></script>
    <script src="{{ url('stisla/dist/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

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

    {{-- captcha --}}
    <script>
        $(document).ready(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            get_recaptcha();
            $('#re_recapt').click(function(e) {
                get_recaptcha();
            });

            $('#bt_check').click(function(e) {
                let recapt_val = $('canvas[class="cv active"]').data('canvas');
                // alert("{{ route('cek-captcha') }}");
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('cek-captcha') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        recaptcha: recapt_val
                    },
                    dataType: "JSON",
                    success: function(res) {
                        // alert(res.success ? 'Captcha benar' : 'Captcha salah')
                        console.log(res.success ? 'Captcha benar' : 'Captcha salah');


                    }
                });
            });
        });

        function get_recaptcha() {
            $.ajax({
                type: "GET",
                url: "{{ route('get-captcha') }}",
                dataType: "JSON",
                success: function(res) {
                    $('#rc').text(res.rc);
                    for (const key in res.captcha) {
                        make_canvas(res.captcha[key], key);
                    }
                }
            });
        }

        function make_canvas(text, index) {
            $('canvas[class="cv active"]').attr('class', 'cv').css('border', '1px solid #747672');

            var canvas = document.getElementById("canvas_" + index);
            var ctx = canvas.getContext("2d");
            ctx.save();
            ctx.font = " italic bold 20px Comic Sans";
            let random_number = Math.floor(Math.random() * 14) + 1;
            ctx.rotate(random_number * Math.PI / 180);
            generate_noise(ctx);
            ctx.fillText(text, 18, 30);
            ctx.restore();
        }
        //generate noise background
        function generate_noise(ctx) {
            var w = ctx.canvas.width,
                h = ctx.canvas.height,

                /* This creates a new ImageData object
                with the specified dimensions(i.e canvas
                width and height). All pixels are set to
                transparent black (i.e rgba(0,0,0,0)). */
                idata = ctx.createImageData(w, h),

                // Creating Uint32Array typed array
                buffer32 = new Uint32Array(idata.data.buffer),
                buffer_len = buffer32.length,
                i = 0

            for (; i < buffer_len; i++) buffer32[i] = ((150 * Math.random()) | 0) << 24;
            /* The putImageData() method puts the image
                       data (from a specified ImageData object) back onto the canvas. */
            ctx.putImageData(idata, 0, 0);
        }

        $(document).on('click', '.cv', function() {
            $('canvas[class="cv active"]').attr('class', 'cv').css('border', '1px solid #747672');
            $(this).css('border', '4px solid #EB4747').attr('class', 'cv active');
            $('#c-captcha').val($(this).data('canvas'));
            console.log($(this).data('canvas'));
        });
    </script>
</body>

</html>
