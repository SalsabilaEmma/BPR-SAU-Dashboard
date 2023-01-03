<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use \PDF;
// use Barryvdh\DomPDF\Facades as PDF;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request as FacadesRequest;
use App\Exports\MutasiTopupExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\DaftarTabunganController;
use PhpParser\Node\Expr\Cast\Double;
use Svg\Tag\Rect;

class TopupController extends Controller
{
    public function getMutasiTopup(Request $request)
    {
        $session = Session::get('login')[0];
        // dd($session);
        // if ($request->isMethod('POST')) {
        if ($request->tglawal == null) {
            $request->tglawal = date('Y-m-d', strtotime(now()->startOfMonth()));
        }
        if ($request->tglakhir == null) {
            $request->tglakhir = date('Y-m-d', strtotime(now()));
        }
        $payload = [
            "cif" => $session['cif'], //$request->rekening//
            "tglawal" => $request->tglawal,
            "tglakhir" => $request->tglakhir,
        ];
        // dd($payload);
        $data = $this->jwt($payload);
        $form = [
            'method' => 'get_mutasitopup',
            'orderdata' => $data,
        ];
        $body = $this->apiGetMutasiTopup($form);
        $data = json_decode($body, true);
        // dd($data);
        if ($data['status'] == "00") {
            $mutasi = $data['data'];
            // dd($mutasi);
            $mutasi = collect($mutasi);
            // modal - dropdown produk //
            $form = [
                'method' => 'get_daftarproduk'
            ];
            $body = $this->apiGetDaftarProduk($form);
            $data = json_decode($body, true);
            $thisdata = $data['data'];

            // modal - dropdown rekening //
            $payload = [
                "cif" => $session['cif'],
                "password" => decrypt($session['pas'])
            ];
            $data = $this->jwt($payload);
            $form = [
                'method' => 'get_tabungan',
                'orderdata' => $data
            ];
            $body = $this->apiRequestTabungan($form);
            $data = json_decode($body, true);
            $dataRek = $data['data']['data_tabungan'];

            return view('sby-pay.sbypay-page', compact('mutasi', 'thisdata', 'dataRek'));
            // return redirect()->route('getDataTopup', compact('mutasi', 'thisdata', 'dataRek'));
        } else {
            $mutasi = $data;
            // $mutasi = collect($mutasi);
            $mutasi = collect();
            // dd($mutasi2);
            // modal - dropdown produk //
            $form = [
                'method' => 'get_daftarproduk'
            ];
            $body = $this->apiGetDaftarProduk($form);
            $data = json_decode($body, true);
            $thisdata = $data['data'];

            // modal - dropdown rekening //
            $payload = [
                "cif" => $session['cif'],
                "password" => decrypt($session['pas'])
            ];
            $data = $this->jwt($payload);
            $form = [
                'method' => 'get_tabungan',
                'orderdata' => $data
            ];
            $body = $this->apiRequestTabungan($form);
            $data = json_decode($body, true);
            $dataRek = $data['data']['data_tabungan'];

            return view('sby-pay.sbypay-page', compact('mutasi', 'thisdata', 'dataRek'));

            // $message = $data['message'];
            // return redirect()->back()->with('error', $message);
        }
        // } else {
        //     return back();
        // }
        return back() ?:  abort(404);
    }

    public function getDataTopup(Request $request)
    {
        // dd($request->all());
        if ($request->isMethod('POST')) {
            $request->validate([
                'idpel' => 'required|numeric',
                'kodeproduk' => 'required',
                'rekening' => 'required'
            ]);
            $idpel = $request->idpel;
            // dd($idpel);
            $kodeproduk = $request->kodeproduk;
            $keterangan = $request->keterangan;
            $rekening = $request->rekening;
            $saldo = $request->saldo;
            $saldo2 = (int)str_replace(',', '', $saldo);
            $nominal = $request->nominal;
            $nominal2 = (int)$nominal;
            // dd($saldo2);
            if ($saldo2 >= $nominal2) { //belum dicek
                $saldoakhir = $saldo2 - $nominal2;
                // dd($saldoakhir);
                $data = [
                    "idpel" => $request->idpel,
                    "kodeproduk" => $request->kodeproduk,
                    "keterangan" => $request->keterangan,
                    "rekening" => $request->rekening,
                    "saldo" => $request->saldo,
                    "nominal" => $request->nominal,
                    "saldoakhir" => $saldoakhir
                ];
                // dd($data);
                Session::push('getDataTopup', $data);
                // return $this->confirm($data);
                return view('sby-pay.confirm-topup', compact('data'));
            } else { //saldo < nominal
                $message = 'Saldo Tidak Mencukupi!';
                return redirect()->back()->with('warning', $message);
            }
            // dd($saldoakhir);
        } else {
            return back();
        }
    }

    public function bayarPin(Request $request)
    {
        // if ($request->isMethod('POST')) {
        // Session::forget('bayarPin');
        $session = Session::get('login')[0];
        $request->validate([
            'cif' => $session['cif'],
            // 'pin' => 'required', 'numeric', 'max:6'
            'pin' => 'required|numeric',
        ]);
        $cif = $session['cif'];
        $pin = $request->pin;
        $payload = [
            "cif" => $session['cif'],
            "pin" => $request->pin
        ];
        // dd($payload);
        $data = $this->jwt($payload);
        $form = [
            'method' => 'get_saldotabunganpin',
            'orderdata' => $data
        ];
        $body = $this->apiGetSaldoTabunganPin($form);
        $data = json_decode($body, true);
        // dd($data);
        if ($data['status'] == 00) {
            // dd('pin betuls');
            // masuk function postTopup
            $session = Session::get('getDataTopup');
            $session2 = $session[count($session) - 1];

            $payload = [
                "rekening" => $session2['rekening'],
                "idpel" => $session2['idpel'],
                "kodeproduk" => $session2['kodeproduk'],
                "pin" => $request->pin,
            ];
            // $a = $payload['idpel'];
            $data = $this->jwt($payload);
            $form = [
                'method' => 'post_topup',
                'orderdata' => $data
            ];

            $body = $this->apiPostTopup($form);
            $data = json_decode($body, true);
            // dd($data);
            // Session::push('bayarPin', $thisdata);

            if ($data["status"] == 00) {
                // SWEET ALERT
                $message = $data['message'];
                // dd($message);
                return redirect(route('getMutasiTopup'))->with('success', $message);
                // return redirect(route('getMutasiTopup'))->with('success', $message);
                // return view('invoice-topup', compact('data'));
            } else {
                $message = $data['message'];
                // dd($message);
                return redirect(route('getMutasiTopup'))->with('error', $message);
            }
        } else {
            // PIN Salah
            $message = $data['message'];
            // return view('sby-pay.confirm-topup', compact('data'))->with('error', $message);
            return redirect(route('getMutasiTopup'))->with('error', $message);
        }
    }
    public function invoiceTopup(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = [
                "idpel" => $request->idpel,
                "status" => $request->status,
                "kodeproduk" => $request->kodeproduk,
                "rekening" => $request->rekening,
                "keterangan" => $request->keterangan,
                "nominal" => $request->nominal,
                "reff" => $request->reff,
                "datetime" => $request->datetime,
            ];
            // return view('sby-pay.invoice-topup', compact('data'));
            // dd($data);
            $pdf = PDF::loadview('sby-pay.pdf-invoice', ['data' => $data])->setPaper('A4', 'potrait');
            return $pdf->stream('Invoice Top Up.pdf');
        } else {
            return redirect()->back();
        }
    }

    public function postTopup(Request $request)
    { //lalallallallalaaa
        // dd($data);
        // Session::forget('getDataTopup');
        // $request->validate([
        //     'cif' => 'required',
        //     'nohp' => 'required'
        // ]);
        $session = Session::get('getDataTopup');
        $session2 = $session[count($session) - 1];
        dd($session2);
        $rekening = $request->rekening;
        $idpel = $request->idpel;
        $kodeproduk = $request->kodeproduk;
        $saldo = $request->saldo;
        $pin = $request->pin;

        $payload = [
            "rekening" => $request->rekening,
            "idpel" => $request->idpel,
            "kodeproduk" => $request->kodeproduk,
            "pin" => $request->pin,
        ];
        dd($payload);
        $data = $this->jwt($payload);
        $form = [
            'method' => 'post_topup',

            'orderdata' => $data
        ];

        $body = $this->apiPostTopup($form);
        $data = json_decode($body, true);
    }

    public function confirm($data) //gajadi
    {
        $data = Session::get('getDataTopup')[0];
        //    dd($data);
        return view('sby-pay.confirm-topup', compact('data'));
    }

    public function cetakPdf(Request $request)
    {
        $session = Session::get('login')[0];
        if ($request->isMethod('POST')) {
            if ($request->tglawal == null) {
                $request->tglawal = date('Y-m-d', strtotime(now()->startOfMonth()));
            }
            if ($request->tglakhir == null) {
                $request->tglakhir = date('Y-m-d', strtotime(now()));
            }
            $payload = [
                "cif" => $session['cif'], //$request->rekening//
                "tglawal" => $request->tglawal,
                "tglakhir" => $request->tglakhir,
            ];
            // dd($payload);
            $data = $this->jwt($payload);
            $form = [
                'method' => 'get_mutasitopup',
                'orderdata' => $data,
            ];
            $body = $this->apiGetMutasiTopup($form);
            $data = json_decode($body, true);
            // dd($data);
            if ($data['status'] == "99") {
                $mutasi = collect();
                $pdf = PDF::loadview('sby-pay.pdf_kosong')->setPaper('a4', 'landscape');
                return $pdf->stream('Mutasi Top Up.pdf');
            }
            $mutasi = $data['data'];
            $mutasi = collect($mutasi);
            // dd($mutasi);

            $pdf = PDF::loadview('sby-pay.pdf', ['mutasi' => $mutasi])->setPaper('a4', 'landscape');
            return $pdf->stream('Mutasi Top Up.pdf');
        } else {
            return back();
        }
    }


    public function exportExcel(Request $request)
    {
        $session = Session::get('login')[0];
        if ($request->isMethod('POST')) {
            if ($request->tglawal == null) {
                $request->tglawal = date('Y-m-d', strtotime(now()->startOfMonth()));
            }
            if ($request->tglakhir == null) {
                $request->tglakhir = date('Y-m-d', strtotime(now()));
            }
            $payload = [
                "cif" => $session['cif'], //$request->rekening//
                "tglawal" => $request->tglawal,
                "tglakhir" => $request->tglakhir,
            ];
            // dd($payload);
            $data = $this->jwt($payload);
            $form = [
                'method' => 'get_mutasitopup',
                'orderdata' => $data,
            ];
            $body = $this->apiGetMutasiTopup($form);
            $data = json_decode($body, true);
            // dd($data);
            if ($data['status'] == "99") {
                $mutasi = collect();
            }
            $mutasi = $data['data'];
            $mutasi = collect($mutasi);
            // dd($mutasi);
            // $mutasi = collect($mutasi)->send(new MutasiExport($mutasi));

            return Excel::download(new MutasiTopupExport($mutasi), 'Mutasi-Topup.xlsx');
        } else {
            return back();
        }
    }
}
