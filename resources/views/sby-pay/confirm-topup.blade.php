@extends('layout.app')
@section('content')
    <link rel="stylesheet" href="{{ url('stisla/dist/assets/css/confirm.css') }}">
    <div class="main-content">
        <div class="container">
            <tbody>
                <tr>
                    <td class="container" width="600">
                        <div class="content">
                            <table class="main" width="100%" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="content-wrap aligncenter">
                                            <table width="100%" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr class="content-block">
                                                        <img src="../gallery/cropped-surya-artha-utama-2.webp"
                                                            alt="logo" width="90" class="rounded-square">
                                                        <p style="padding-top:0px; padding-bottom:0px; font-size: 18pt; font-family:Georgia, 'Times New Roman', Times, serif">Konfirmasi Top Up Suroboyo Pay</p>
                                                    </tr>
                                                    <tr>
                                                        <td class="content-block">
                                                            <table class="invoice">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <table class="invoice-items" cellpadding="0"
                                                                                cellspacing="0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>ID Pelanggan</td>
                                                                                        <td class="alignright">
                                                                                            {{ $data['idpel'] }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Produk</td>
                                                                                        <td class="alignright">
                                                                                            {{ $data['keterangan'] }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Harga</td>
                                                                                        <td class="alignright">Rp.
                                                                                            {{ number_format($data['nominal']) }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Debet Tab</td>
                                                                                        <td class="alignright">
                                                                                            {{ $data['rekening'] }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Sisa Saldo Awal</td>
                                                                                        <td class="alignright">Rp.
                                                                                            {{ $data['saldo'] }}</td>
                                                                                    </tr>
                                                                                    <tr class="total">
                                                                                        <td class="alignright"
                                                                                            width="80%">
                                                                                            Sisa Saldo Akhir </td>
                                                                                        <td class="alignright"> Rp.
                                                                                            {{ number_format($data['saldoakhir']) }}
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <div class="card-footer text-right">
                                                                                <button type="submit" data-toggle="modal"
                                                                                    data-target="#modal"
                                                                                    class="btn btn-info">Bayar</button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        {{-- <td class="content-block">
                                                        Company Inc. 123 Van Ness, San Francisco 94102
                                                    </td> --}}
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            {{-- <div class="footer">
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td class="aligncenter content-block">Copyright &copy; BPR. Surya Artha Utama</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> --}}
                        </div>
                    </td>
                    <td></td>
                </tr>
            </tbody>
            </table>

            <div class="modal fade" tabindex="-1" role="dialog" id="modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">PIN</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('bayarPin') }}" method="POST" >
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    {{-- <label>PIN</label> --}}
                                    <input type="hidden" name="rekening" value="_rekening_" hidden>
                                    <input type="password"
                                        class="form-control form-control-sm @error('pin') is-invalid @enderror"
                                        placeholder="Masukkan PIN" name="pin" required>
                                    @error('pin')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="modal-footer bg-whitesmoke br">
                                    <button type="submit" id="bt_saldo" onclick="get_saldo()"
                                        class="btn btn-info">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>\
        </div>
    @endsection

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
