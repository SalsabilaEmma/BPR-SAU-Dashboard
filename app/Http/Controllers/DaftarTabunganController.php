<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function Symfony\Component\String\b;

class DaftarTabunganController extends Controller
{
    public function daftarTabungan(Request $request)
    {
        $session = Session::get('login')[0];
        // dd($session);
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
        $key = $data["status"];
        // dd($data);

        if ($key == "00") {
            // Session::get('daftarTabungan');
            Session::put('daftarTabungan', $data);
            return $this->saldoTabungan($data);
        } elseif ($key == "99") {
            $message = $data['message'];
            return redirect()->back()->with('error', $message);
        } else {
            $message = $data['message'];
            return redirect()->back()->with('error', $message);
        }

        return back() ?:  abort(404);
    }

    public function saldoTabungan($data)
    {
        // return $data;
        $key = $data["data"];
        $key2 = $key["data_tabungan"];
        return view('rekening', compact('key', 'key2'));
    }

    public function get_saldotabunganpin(Request $request)
    {
        Session::forget('get_saldotabunganpin');
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

        $data = $this->jwt($payload);
        $form = [
            'method' => 'get_saldotabunganpin',
            'orderdata' => $data
        ];
        $body = $this->apiGetSaldoTabunganPin($form);
        $data = json_decode($body, true);
        $key = $data["status"];
        // dd($data);

        if ($key == 00) {
            $session = Session::get('login')[0];
            // dd($session);
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
            $key = $data["status"];

            if ($key == "00") {
                return response()->json([
                    'data' => $data['data']['total_saldo'],
                    'status' => $data['status']
                ]);
                // dd(response());
            } else {
                // return response()->json(['error' => 'Gagal']);
            $message = $data['message'];
            return redirect()->back()->with('error', $message);
            }
        } else {
            // return response()->json(['error' => 'Gagal']);
            $message = $data['message'];
            return redirect()->back()->with('error', $message);
        }
    }
}
