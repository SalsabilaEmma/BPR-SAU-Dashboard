@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container">
            <section class="section text-dark">
                <div class="section-header">
                    <h1>Konfirmasi Top Up</h1>
                    <div class="section-header-breadcrumb">
                    </div>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-4"></div>
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Top Up Suroboyo Pay</h4>
                                </div>
                                <div class="card-body">
                                    <p>ID Pelanggan : {{ $data['idpel'] }}</p>
                                    <p>Produk : {{ $data['keterangan'] }}</p>
                                    <p>Harga : Rp. {{ number_format($data['nominal']) }}</p>
                                    <p>Debet Tab : {{ $data['rekening'] }}</p>
                                    <p>Sisa Saldo Awal : Rp. {{ $data['saldo'] }}</p>
                                    <p>Sisa Saldo Akhir : Rp. {{ number_format($data['saldoakhir']) }}</p>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Bayar</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
