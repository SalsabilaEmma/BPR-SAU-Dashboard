@extends('layout.app')
@section('content')

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
            integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    </head>
    <div class="main-content">
        <div class="container">
            <section class="section">
                <div class="section-header">
                    <h1>Top Up Suroboyo Pay</h1>
                    <div class="section-header-breadcrumb">
                    </div>
                </div>
                <div class="section-body">
                    {{-- <h2 class="section-title"> </h2> --}}
                    <div class="row text-dark">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Laporan Transaksi</h4>
                                </div>
                                <div class="card-body">
                                    <label>Filter Tanggal</label>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <form action="{{ route('getMutasiTopup') }}" method="POST">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="text" name="cif" value="{{ request()->cif }}"
                                                        hidden>
                                                    <div class="form-group col-md-5">
                                                        <input id="awal" type="date" class="form-control"
                                                            name="tglawal" placeholder="{{ request()->tglawal }}"
                                                            value="{{ request()->tglawal }}">
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <input id="akhir" type="date" class="form-control"
                                                            name="tglakhir" placeholder="{{ request()->tglakhir }}"
                                                            value="{{ request()->tglakhir }}">
                                                    </div>
                                                    <div class="form-group col-md-2" style="text-align: right">
                                                        <button class="btn btn-primary" id="filter"
                                                            type="submit">Cari</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="form-group">
                                            <form action="{{ route('cetakPdfTopup') }}" method="POST" target="_blank">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="hidden" value="{{ request()->cif }}" name="rekening"
                                                        id="">
                                                    <input type="hidden" value="{{ request()->tglawal }}" name="tglawal"
                                                        id="">
                                                    <input type="hidden" value="{{ request()->tglakhir }}" name="tglakhir"
                                                        id="">
                                                    <button id="filter" type="submit"
                                                        class="btn btn-outline-primary">Cetak PDF</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="form-group" style="padding-left: 10px">
                                            <form action="{{ route('exportExcelTopup') }}" method="POST" target="_blank">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="hidden" value="{{ request()->cif }}" name="rekening"
                                                        id="">
                                                    <input type="hidden" value="{{ request()->tglawal }}" name="tglawal"
                                                        id="">
                                                    <input type="hidden" value="{{ request()->tglakhir }}" name="tglakhir"
                                                        id="">
                                                    <button id="filter" type="submit"
                                                        class="btn btn-outline-primary">Export Excel</button>
                                                </div>
                                            </form><br>
                                        </div>
                                        <div class="form-group" style="padding-left: 150px">
                                            <button type="submit" id="topup" data-toggle="modal"
                                                data-target="#exampleModal" class="btn btn-outline-info"><i
                                                    class="fa fa-credit-card"></i>
                                                <span> Top Up</span></button>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-striped" name="filter" id="table-1">
                                            {{-- id="table-1" --}}
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No</th>
                                                    <th>Status</th>
                                                    <th>Kode Produk</th>
                                                    <th>Nominal</th>
                                                    <th>ID Pelanggan</th>
                                                    <th>Reff</th>
                                                    <th>Rekening Tabungan</th>
                                                    <th>Keterangan</th>
                                                    <th>Invoice</th>
                                                </tr>
                                            </thead>
                                            <div class="container2">
                                                {{-- <div class="banner"> --}}
                                                <tbody>
                                                    @foreach ($mutasi as $no => $m)
                                                        <tr class="text-center">
                                                            <td class="text-center">{{ $no + 1 }}</td>
                                                            <td>
                                                                @if ($m['status'] == 0)
                                                                    <div class="badge badge-warning">Pending</div>
                                                                @elseif ($m['status'] == 1)
                                                                    <div class="badge badge-success">Sukses</div>
                                                                @elseif ($m['status'] == 2)
                                                                    <div class="badge badge-danger">Gagal</div>
                                                                @endif
                                                            </td>
                                                            <td>{{ $m['kodeproduk'] }}</td>
                                                            <td class="text-right">Rp. {{ number_format($m['nominal']) }}
                                                            </td>
                                                            <td class="text-right">{{ $m['idpel'] }}</td>
                                                            <td>{{ $m['reff'] }}</td>
                                                            <td>{{ $m['rekening'] }}</td>
                                                            <td class="text-left">{{ $m['keterangan'] }}</td>
                                                            <td>
                                                                @if ($m['status'] == 1)
                                                                    <form action="{{ route('invoiceTopup') }}"
                                                                        method="post" target="_blank">
                                                                        @csrf
                                                                        <input type="text" name="status"
                                                                            value="{{ $m['status'] }}" hidden>
                                                                        <input type="text" name="kodeproduk"
                                                                            value="{{ $m['kodeproduk'] }}" hidden>
                                                                        <input type="text" name="nominal"
                                                                            value="{{ $m['nominal'] }}" hidden>
                                                                        <input type="text" name="idpel"
                                                                            value="{{ $m['idpel'] }}" hidden>
                                                                        <input type="text" name="reff"
                                                                            value="{{ $m['reff'] }}" hidden>
                                                                        <input type="text" name="rekening"
                                                                            value="{{ $m['rekening'] }}" hidden>
                                                                        <input type="text" name="keterangan"
                                                                            value="{{ $m['keterangan'] }}" hidden>
                                                                        <input type="text" name="datetime"
                                                                            value="{{ $m['datetime'] }}" hidden>
                                                                        <button class="btn btn-outline-primary btn-sm fa fa-file"></button>
                                                                    </form>
                                                                    {{-- <a href="{{route('invoiceTopup')}}">
                                                                        <button class="btn btn-outline-primary btn-sm fa fa-file"></button></a> --}}
                                                                @elseif ($m['status'] == 0)
                                                                    <button
                                                                        class="btn btn-outline-warning btn-sm fa fa-clock">
                                                                    </button>
                                                                @else
                                                                    <button
                                                                        class="btn btn-outline-danger btn-sm fa fa-times">
                                                                    </button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                {{-- </div> --}}
                                            </div>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Top Up Suroboyo Pay</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('getDataTopup') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>No HP</label>
                            <input type="number" name="idpel"
                                class="form-control @error('idpel') is-invalid @enderror" required>
                            @error('idpel')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Produk</label>
                            <select class="form-control form-control-sm @error('kodeproduk') is-invalid @enderror"
                                name="kodeproduk" id="produk" required>
                                <option selected hidden value="">- Pilih Produk -</option>
                                @foreach ($thisdata as $produk)
                                    <option name="kodeproduk" data-keterangan="{{ $produk['keterangan'] }}"
                                        data-kodeproduk="{{ $produk['kode_biller'] }}"
                                        data-nominal="{{ $produk['nominal'] }}" value="{{ $produk['keterangan'] }}">
                                        {{ $produk['keterangan'] }}</option>
                                @endforeach
                            </select>
                            @error('kodeproduk')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Rekening Tabungan</label>
                            <select class="form-control form-control-sm @error('rekening') is-invalid @enderror"
                                name="rekening" id="rekening" required>
                                <option selected hidden value="">- Pilih Rekening Tabungan -</option>
                                @foreach ($dataRek as $rek)
                                    <option name="sisa" name="rekening"
                                        data-saldo="{{ substr($rek['saldo'], 0, -3) }}" value="{{ $rek['rekening'] }}">
                                        {{ $rek['rekening'] }}</option>
                                @endforeach
                            </select>
                            @error('rekening')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Sisa Saldo</label>
                            <input type="text" id="input" name="saldo" class="form-control form-control-sm"
                                readonly>
                            <input hidden type="hidden" id="kodeproduk" name="kodeproduk"
                                class="form-control form-control-sm">
                            <input hidden type="hidden" id="keterangan" name="keterangan"
                                class="form-control form-control-sm">
                            {{-- <input type="text" id="keterangan" name="keterangan" class="form-control form-control-sm"> --}}
                            <input hidden type="hidden" id="nominal" name="nominal"
                                class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Proses</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // Ambil dari atribut data
        $(document).ready(function() {
            $('#rekening').on('change', function() {
                const selected = $(this).find('option:selected');
                const saldo = selected.data('saldo');

                $("#input").val(saldo);
            });
        });
    </script>
    <script>
        // Ambil dari atribut data
        $(document).ready(function() {
            $('#produk').on('change', function() {
                const selected = $(this).find('option:selected');
                const kodeproduk = selected.data('kodeproduk');
                const keterangan = selected.data('keterangan');
                const nominal = selected.data('nominal');

                $("#kodeproduk").val(kodeproduk);
                $("#keterangan").val(keterangan);
                $("#nominal").val(nominal);
            });
        });
    </script>
@endsection
