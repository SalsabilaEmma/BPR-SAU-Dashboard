@extends('layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Beranda</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"></div>
                    {{-- <div class="breadcrumb-item"><a href="#">Modules</a></div>
                    <div class="breadcrumb-item">DataTables</div> --}}
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="hero text-white hero-bg-image hero-bg-parallax"
                            style="background-image: url('../gallery/asasasasa.png');">
                            <div class="hero-inner">
                                <h2>Selamat Datang di Dashboard Monitoring BPR Surya Artha Utama, <br><br>
                                    {{ $data['nama'] }}</h2>
                                <p class="lead">{{ $data['cif'] }}</p>
                                <p>{{ $data['alamat'] }}</p>
                                <div class="mt-4">
                                    <a href="{{ route('daftarTabungan') }}"
                                        class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fa fa-list"></i>
                                        Saldo Tabungan</a>
                                    <a href="{{ route('getMutasiTopup') }}"
                                        class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fa fa-list"></i>
                                        Top Up Suroboyo Pay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
