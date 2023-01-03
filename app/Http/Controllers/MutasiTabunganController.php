<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use \PDF;
// use Barryvdh\DomPDF\Facades as PDF;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request as FacadesRequest;
use App\Exports\MutasiExport;
use Maatwebsite\Excel\Facades\Excel;

class MutasiTabunganController extends Controller
{

    public function getMutasi(Request $request)
    {
        if ($request->isMethod('POST')) {

            if ($request->tglawal == null) {
                $request->tglawal = date('Y-m-d', strtotime(now()->startOfMonth()));
            }
            if ($request->tglakhir == null) {
                $request->tglakhir = date('Y-m-d', strtotime(now()));
            }
            $payload = [
                "rekening" => $request->rekening, //$request->rekening//
                "tglawal" => $request->tglawal,
                "tglakhir" => $request->tglakhir,
            ];
            $data = $this->jwt($payload);
            $form = [
                'method' => 'get_mutasi_tabungan',
                'orderdata' => $data,
            ];
            $body = $this->apiRequestTabungan($form);
            $data = json_decode($body, true);
            // dd($data);
            if ($data['status'] == "00") {
                $mutasi = $data['data'];
                $mutasi = collect($mutasi);
                // dd($mutasi);
            return view('mutasi', compact('mutasi'));
            } else {
                $mutasi = collect();
                return view('mutasi', compact('mutasi'));
            }
        } else {
            return back();
        }
    }
    public function cetakPdf(Request $request)
    {
        if ($request->isMethod('POST')) {
            if ($request->tglawal == null) {
                $request->tglawal = date('Y-m-d', strtotime(now()->startOfMonth()));
            }
            if ($request->tglakhir == null) {
                $request->tglakhir = date('Y-m-d', strtotime(now()));
            }
            $payload = [
                "rekening" => $request->rekening,
                "tglawal" => $request->tglawal,
                "tglakhir" => $request->tglakhir,
            ];
            // dd($payload);
            $data = $this->jwt($payload);
            $form = [
                'method' => 'get_mutasi_tabungan',
                'orderdata' => $data,
            ];
            $body = $this->apiRequestTabungan($form);
            $data = json_decode($body, true);
            // dd($data);
            if ($data['status'] == "99") {
                $mutasi = collect();
                $pdf = PDF::loadview('mutasi_pdf_kosong')->setPaper('a4', 'landscape');
                return $pdf->stream('Mutasi Tabungan.pdf');
            }
            $mutasi = $data['data'];
            $mutasi = collect($mutasi);
            // dd($mutasi);

            $pdf = PDF::loadview('mutasi_pdf', ['mutasi' => $mutasi])->setPaper('a4', 'landscape');
            return $pdf->stream('Mutasi Tabungan.pdf');
        } else {
            return back();
        }
    }

    public function exportExcel(Request $request)
    {
        if ($request->isMethod('POST')) {
            if ($request->tglawal == null) {
                $request->tglawal = date('Y-m-d', strtotime(now()->startOfMonth()));
            }
            if ($request->tglakhir == null) {
                $request->tglakhir = date('Y-m-d', strtotime(now()));
            }
            $payload = [
                "rekening" => $request->rekening,
                "tglawal" => $request->tglawal,
                "tglakhir" => $request->tglakhir,
            ];
            // dd($payload);
            $data = $this->jwt($payload);
            $form = [
                'method' => 'get_mutasi_tabungan',
                'orderdata' => $data,
            ];
            $body = $this->apiRequestTabungan($form);
            $data = json_decode($body, true);
            // dd($data);
            if ($data['status'] == "99") {
                $mutasi = collect();
                // $pdf = PDF::loadview('mutasi_pdf_kosong')->setPaper('a4', 'landscape');
                // return $pdf->stream('Mutasi Tabungan.pdf');
            }
            $mutasi = $data['data'];
            $mutasi = collect($mutasi);
            // dd($mutasi);
            // $mutasi = collect($mutasi)->send(new MutasiExport($mutasi));

            return Excel::download(new MutasiExport($mutasi), 'Mutasi.xlsx');
        } else {
            return back();
        }
    }

    public function paginate($items, $perPage, $page, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        $lengthAware = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        return $lengthAware;
    }
}
