<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

                                    {{-- batas recapt --}}
                                    <div class="form-group">
                                        <div class="text-center mt-4 mb-3">
                                            <div class="text-job text-muted">
                                                <h5>klik angka <span id="rc"></span></h5>
                                            </div>
                                        </div>
                                        <div class="row sm-gutters">
                                            <div class="col-2">
                                                <canvas class="cv" style="border:1px solid #767275;" width="50" height="50" id="canvas_0" data-canvas="0"></canvas>
                                            </div>
                                            <div class="col-2">
                                                <canvas class="cv" style="border:1px solid #747672;" width="50" height="50" id="canvas_1" data-canvas="1"></canvas>
                                            </div>
                                            <div class="col-2">
                                                <canvas class="cv" style="border:1px solid #747672;" width="50" height="50" id="canvas_2" data-canvas="2"></canvas>
                                            </div>
                                            <div class="col-2">
                                                <canvas class="cv" style="border:1px solid #747672;" width="50" height="50" id="canvas_3" data-canvas="3"></canvas>
                                            </div>
                                            <div class="col-2">
                                                <canvas class="cv" style="border:1px solid #747672;" width="50" height="50" id="canvas_4" data-canvas="4"></canvas>
                                            </div>
                                            <div class="col-1" style="display: flex; align-items: center; justify-content:center;">
                                                <div id="re_recapt" style="padding-left: 20px">
                                                    <i class="fas fa-sync-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- batas recapt --}}



    {{-- captcha --}}

    <script>
        $(document).ready(function(e) {
            get_recaptcha();
            $('#re_recapt').click(function(e) {
                get_recaptcha();
            });

            $('#bt_check').click(function(e) {
                let recapt_val = $('canvas[class="cv active"]').data('canvas');
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "{{ route('cek-captcha') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        recaptcha: recapt_val
                    },
                    dataType: "JSON",
                    success: function(res) {
                        console.log(res);
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
            $(this).css('border', '1px solid red').attr('class', 'cv active');
        });
    </script>
</body>
</html>
