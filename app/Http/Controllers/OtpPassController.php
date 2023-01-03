<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Session;

class OtpPassController extends Controller
{
    public function index()
    {
        $payload = Session::get('cekReset')[0];
        return view('auth.pass-reset-otp', compact('payload'));
    }

    public function getOtpPass(Request $request)
    {
        if ($request->isMethod('POST')) {
            // dd($data);
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
                "otp" => $request->otp
            ];
            // dd($payload);
            $data = $this->jwt($payload);
            $form = [
                'method' => 'verifikasi_otp',
                'orderdata' => $data
            ];
            $body = $this->apiRequestOtp($form);
            $data = json_decode($body, true);
            $key = $data["status"];
            // dd($data);
            if ($key == "00") {
                // dd('ayayay');
                Session::push('cekReset', $payload);
                Session::push('newPass', true);
                return redirect()->route('newPass');
            } else {
                $message = $data['message'];
                return redirect()->back()->with('error', $message);
            }
            return back();
        } else {
            // dd('masuk method GET');
            $payload = Session::get('cekReset')[0];
            return view('auth.pass-reset-otp', compact('payload'));
        }
    }
}
