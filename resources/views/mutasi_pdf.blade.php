<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mutasi Tabungan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style type="text/css">
         @page {
            size: A4;
            size: landscape;
        }
        h1 {
            font-weight: bold;
            font-size: 20pt;
            text-align: center;
        }
        html {
            -webkit-font-smoothing: antialiased;
            font-size: 75%;

        }
        body {
            position: relative;
            font: 12pt Georgia, "Times New Roman", Times, serif;
            line-height: 1.3;
            padding-top: 30px;
            padding-bottom: 30px;
            padding-right: 30px;
            /* padding-left: 40px; */
            /* width: 1000px; */
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        .table th {
            padding: 8px 8px;
            border:1px solid #000000;
            text-align: center;
        }
        .table td {
            vertical-align: top;
            padding: 3px 3px;
            border:1px solid #000000;
        }
        .text-center {
            text-align: center;
        }
        p {
            font-size: 12pt
        }
        .mt-05 {
            margin-top: 0.5cm;
        }
        .mt-1 {
            margin-top: 1cm;
        }
        .mt-2 {
            margin-top: 2cm;
        }
        .mt-5 {
            margin-top: 5cm;
        }
        .container {
            margin-left: 0.5cm;
            margin-top: 0cm;
            margin-right: 0.5cm;
            margin-bottom: 0.5cm;
        }
        .point {
            width: 1cm;
        }
        .justify {
            text-align: justify;
        }
        .text {
            font-size: 10pt;
            line-height: 25px;
        }

    </style>
</head>

<body class="A4">
    <div class="container">
        <center>
            <table>
                <tr>
                    {{-- <td>
                        <img src="{{ public_path('../bpr_sau_dashboard8/gallery/cropped-surya-artha-utama-2.webp') }}" style="width:2.5cm;">
                    </td> --}}
                    <td>
                        <center style="margin-top: -10px">
                            <p style="font-size: 14pt">
                                 <!-- <br> -->
                                <span style="font-size: 16pt">
                                    <b>PT. BPR SURYA ARTHA UTAMA</b>
                                </span>
                            </p>
                            {{-- <p style="font-size: 10pt; margin-top: -15px">Jl. Walikota Mustajab No. 84 SBY (Kantor Pusat)</p>
                            <p style="font-size: 10pt; margin-top: -15px">Jl. Candi Lontar No. 2A SBY (Kantor Kas)</p> --}}
                            <p style="font-size: 10pt; margin-top: -5px">
                            </p>
                        </center>
                    </td>
                </tr>
            </table>
            <hr style="margin-top: -10px">
        </center>
        <center>
            <div style="font-size: 14pt;">
                <b>MUTASI TABUNGAN</b> <br>
            </div>
                <p style="font-size: 10pt;"> Tanggal  {{ request()->tglawal }} - {{ request()->tglakhir }} </p>
        </center><br>
        <div class="table-responsive">
            <table class="table table-bordered">
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
                <tbody>
                    @foreach ($mutasi as $no => $m)
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
            </table>
        </div>
    </div>
</body>

{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> --}}

</html>
