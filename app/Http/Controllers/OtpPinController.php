<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Session;

class OtpPinController extends Controller
{
    public function index()
    {
        $payload = Session::get('cekResetPin')[0];
        return view('auth.pin-otp', compact('payload'));
    }

    public function getOtpPin(Request $request)
    {
        if ($request->isMethod('POST')) {
            // dd($request);
            Session::forget('getOtp');
            $request->validate([
                'cif' => 'required',
                'nohp' => 'required|numeric',
                'otp' => 'required|numeric'
            ]);
            $cif = $request->cif;
            $nohp = $request->nohp;
            $otp = $request->otp;

            $payload = [
                "cif" => $request->cif,
                "nohp" => $request->nohp,
                "otp" => $request->otp,
                "action" => "RESETPIN"
            ];
            // dd($payload);
            $data = $this->jwt($payload);
            $form = [
                'method' => 'request_otp_flagpin',
                'orderdata' => $data
            ];
            $body = $this->apiResetPin($form);
            $data = json_decode($body, true);
            $key = $data["status"];
            // dd($data);
            if ($key == "00") {
                // dd('ayayay');
                $message = $data['message'];
                return redirect()->route('viewLogin')->with('success', $message);
                Session::flush();
            } else {
                $message = $data['message'];
                return redirect()->back()->with('error', $message);
            }
            return back();
        } else {
            // dd('masuk method GET');
            $payload = Session::get('cekResetPin')[0];
            return view('auth.pin-otp', compact('payload'));
        }
    }

    public function resetPin($data)
    {
        // dd('alo');
        $data = Session::get('cekResetPin')[0];
        // dd($data);
        $cif = $data['cif'];
        $nohp = $data['nohp'];

        $payload = [
            "cif" => $data['cif'],
            "nohp" => $data['nohp']
        ];
        // dd($payload);
        $data = $this->jwt($payload);
        $form = [
            'method' => 'request_otp_flagpin',
            'orderdata' => $data
        ];
        $body = $this->apiResetPin($form);
        $data = json_decode($body, true);
        $key = $data["status"];
        dd($data);
        if ($key == 00) {
            $message = $data['message'];
            return redirect()->back()->with('error', $message);
        } else {
            $message = $data['message'];
            return redirect()->back()->with('error', $message);
        }
    }
}
