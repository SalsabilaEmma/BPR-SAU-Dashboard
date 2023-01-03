@extends('layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <section class="section">
                <div class="section-header">
                    <h1>Informasi Saldo Tabungan</h1>
                    <div class="section-header-breadcrumb">
                    </div>
                </div>
                @if (Session::has('message-gagal'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ Session('message-gagal') }}
                        </div>
                    </div>
                @endif
                <div class="section-body">
                    {{-- <h2 class="section-title"> </h2> --}}
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card card-primary">
                                {{-- <div class="card-header">
                                    <h4></h4>
                                </div> --}}
                                <div class="row card-body text-dark">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <div class="form-row">
                                                    <div class="col-12 col-sm-6 col-lg-6">
                                                        <p>CIF : {{ $key['cif'] }}
                                                        </p>
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-lg-6">
                                                        <p>
                                                            Nama : {{ $key['nama'] }}
                                                        </p>
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-lg-6">
                                                        <p>Tempat, Tanggal Lahir : {{ $key['tempat_lahir'] }},
                                                            {{ $key['tgl_lahir'] }}
                                                        </p>
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-lg-6">
                                                        <p>
                                                            Jenis Kelamin : {{ $key['kelamin'] }}
                                                        </p>
                                                    </div>
                                                </div>
                                                Total Saldo :<br>
                                                <div class="form-row" style="text-align: center">
                                                    <div class="col-10 col-sm-10 col-lg-10">
                                                        <span id="saldo_place" class="form-control" value="">
                                                            Rp. &bull;&bull;&bull;&bull;&bull;&bull;&bull;
                                                        </span>
                                                        {{-- <span type="password" class="form-control" readonly
                                                            id="saldo"></span> --}}
                                                        {{-- value=" Rp {{ $key['total_saldo'] }}" --}}
                                                    </div>
                                                    <div class="col-2 col-sm-2 col-lg-2">
                                                        <div class="input-group-append">
                                                            <!-- kita pasang onclick untuk merubah icon buka/tutup mata setiap diklik  -->
                                                            {{-- <span id="mybutton" onclick="change()"
                                                                class="input-group-text">
                                                                <!-- icon mata bawaan bootstrap  -->
                                                                <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                                    class="bi bi-eye-fill" fill="currentColor"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    style="text-align: right;">
                                                                    <path
                                                                        d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                </svg>
                                                            </span> --}}
                                                            {{-- try --}}
                                                            <button type="submit" data-toggle="modal" id="modal-2"
                                                                data-target="#try" class="btn btn-outline-secondary">

                                                                <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                                    class="bi bi-eye-fill" fill="currentColor"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    style="text-align: right;">
                                                                    <path
                                                                        d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Daftar Rekening </h4>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12">
                                    {{-- <div class="card text-dark">
                                        <div class="card-body"> --}}
                                    <div class="table-responsive">
                                        <table class="table table-sm table-striped text-dark">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th>Rekening</th>
                                                    <th>Atas Nama Rekening</th>
                                                    <th>Golongan Rekening</th>
                                                    <th>Tanggal Buka</th>
                                                    {{-- <th>Saldo</th> --}}
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($key2 as $k)
                                                    <tr>
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td class="text-center">{{ $k['rekening'] }}</td>
                                                        <td>{{ $k['atas_nama_rekening'] }}</td>
                                                        <td class="text-center">{{ $k['golongan_rekening'] }}</td>
                                                        <td class="text-center">{{ $k['tgl_buka'] }}</td>
                                                        {{-- <td class="password" id="pass2">{{ $k['saldo'] }}
                                                                    <span id="mybutton2" onclick="change()">
                                                                    <!-- icon mata bawaan bootstrap  -->
                                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor"
                                                                        xmlns="http://www.w3.org/2000/svg" style="text-align: right;">
                                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                        <path fill-rule="evenodd"
                                                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                    </svg>
                                                                </span>
                                                                </td> --}}
                                                        <td class="text-center">
                                                            <form action="{{ route('getMutasi') }}" method="post">
                                                                @csrf
                                                                <input type="text" name="rekening"
                                                                    value="{{ $k['rekening'] }}" hidden>
                                                                <button class="btn btn-info">Detail</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="try">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">PIN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- <form action="{{ route('saldoTabunganPin') }}" method="POST"> --}}
                {{-- @csrf --}}
                <div class="modal-body">
                    <div class="form-group">
                        {{-- <label>PIN</label> --}}
                        <input type="hidden" name="rekening" value="_rekening_" hidden>
                        <input type="password" class="form-control form-control-sm @error('pin') is-invalid @enderror"
                            placeholder="Masukkan PIN" name="pin" required>
                        @error('pin')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" id="bt_saldo" onclick="get_saldo()" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{-- ajax --}}
    <script>
        function get_saldo() {
            var pin = $("input[name='pin']").val();

            $.ajax({
                type: 'POST',
                url: "{{ route('saldoTabunganPin') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    pin: pin
                },
                success: function(data) {
                    // document.getElementById('nama').value = data['data']['nama'];
                    $('#saldo_place').text(data.data);
                    $('#try').modal('hide');
                }
                // alert('Data Tidak Ditemukan !');
                // window.location = "new-registration";
            });
        }
    </script>

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

        // data
    </script>
@endsection
