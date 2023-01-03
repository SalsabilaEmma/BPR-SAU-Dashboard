<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Top Up &mdash; BPR SAU</title>

    <link rel="stylesheet" href="{{ url('stisla/dist/assets/css/confirm.css') }}">
</head>

<body>
    <div class="main-content">
        <div class="container">
            <table style="border-radius: 10px" class="body-wrap">
                <tbody>
                    <tr>
                        <td></td>
                        <td class="container" width="600">
                            <div class="content">
                                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td class="content-wrap aligncenter">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <div class="content-block">
                                                            <img src="../gallery/cropped-surya-artha-utama-2.webp"
                                                                alt="logo" width="90">
                                                            <p
                                                                style="padding-top:0px; padding-bottom:0px; font-size: 18pt; font-family:Georgia, 'Times New Roman', Times, serif">
                                                                BPR Surya Artha Utama</p>
                                                            <p style="padding-top:0px; font-size: 12pt;">Invoice Top Up
                                                                Suroboyo Pay</p>
                                                            <hr>
                                                        </div>
                                                        <tr>
                                                            <td class="content-block">
                                                                <table class="invoice">
                                                                    <tbody>
                                                                        <tr style="text-align:right;">
                                                                            <td>{{ $data['datetime'] }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <table class="invoice-items"
                                                                                    cellpadding="0" cellspacing="0">
                                                                                    <tbody>
                                                                                        {{-- <tr>
                                                                                            <td>Tanggal</td>
                                                                                            <td class="alignright">
                                                                                                {{ $data['datetime'] }}</td>
                                                                                        </tr> --}}
                                                                                        <tr>
                                                                                            <td>ID Pelanggan</td>
                                                                                            <td class="alignright">
                                                                                                {{ $data['idpel'] }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Produk</td>
                                                                                            <td class="alignright">
                                                                                                {{ $data['keterangan'] }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Harga Produk</td>
                                                                                            <td class="alignright">Rp.
                                                                                                {{ number_format($data['nominal']) }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Debet Tab</td>
                                                                                            <td class="alignright">
                                                                                                {{ $data['rekening'] }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="total">
                                                                                            <td class="alignright"
                                                                                                width="80%">
                                                                                                Total Bayar </td>
                                                                                            <td class="alignright"> Rp.
                                                                                                {{ number_format($data['nominal']) }}
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="content-block">
                                                                @if ($data['status'] == 1)
                                                                    <div class="badge badge-success"
                                                                        style="-webkit-text-fill-color: white">Sukses
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
