@extends('layout.app')
@section('content')
    <!-- Main Content hal ne ini-->
    <div class="main-content">
        <div class="container">
            <section class="section">
                <div class="section-header">
                    <h1>Mutasi Tabungan</h1>
                    <div class="section-header-breadcrumb">
                    </div>
                </div>
                <div class="section-body">
                    {{-- <h2 class="section-title"> </h2> --}}
                    <div class="row text-dark">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Mutasi Rekening - {{ request()->rekening }}</h4>
                                </div>
                                <div class="card-body">
                                    <label>Filter Tanggal</label>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <form action="{{ route('getMutasi') }}" method="POST">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="text" name="rekening" value="{{ request()->rekening }}"
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
                                            <form action="{{ route('cetakPdf') }}" method="POST" target="_blank">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="hidden" value="{{ request()->rekening }}" name="rekening"
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
                                            <form action="{{ route('exportExcel') }}" method="POST" target="_blank">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="hidden" value="{{ request()->rekening }}" name="rekening"
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
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-striped" name="filter" id="table-1">
                                            {{-- id="table-1" --}}
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No</th>
                                                    <th>Cabang Entry</th>
                                                    <th>Faktur</th>
                                                    <th>Tanggal</th>
                                                    <th>Kode Transaksi</th>
                                                    <th>DK</th>
                                                    <th>Keterangan</th>
                                                    <th>Debet</th>
                                                    <th>Kredit</th>
                                                    <th>Username</th>
                                                </tr>
                                            </thead>
                                            <div class="container2">
                                                {{-- <div class="banner"> --}}
                                                <tbody>
                                                    @foreach ($mutasi as $no => $m)
                                                        {{-- {{dd($mutasi)}} --}}
                                                        <tr class="text-center">
                                                            <td class="text-center">{{ $no + 1 }}</td>
                                                            <td>{{ $m['cabangentry'] }}</td>
                                                            <td>{{ $m['faktur'] }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($m['tgl'])) }}</td>
                                                            <td>{{ $m['kodetransaksi'] }}</td>
                                                            <td>{{ $m['dk'] }}</td>
                                                            <td class="text-left">{{ $m['keterangan'] }}</td>
                                                            {{-- <td class="text-left">{{ substr($m['keterangan'], 0, 30) }} ... </td> --}}
                                                            <td class="text-right" style="width: 110px">Rp. {{ number_format($m['debet']) }}</td>
                                                            <td class="text-right" style="width: 110px">Rp. {{ number_format($m['kredit']) }}</td>
                                                            <td>{{ $m['username'] }}</td>
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
@endsection
