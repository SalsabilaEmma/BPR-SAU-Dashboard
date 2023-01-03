<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Session;

class ForgetPinController extends Controller
{

    // Forget PIN Area !!

    public function index()
    {
        $data = Session::get('login');
        if ($data != null) return redirect(route('viewResetPin'));

        return view('auth.pin-cek');
    }
    public function cekResetPin(Request $request)
    {
        if ($request->isMethod('POST')) {
            // Session::forget('cekResetPin');
            $request->validate([
                'cif' => 'required|numeric',
                'nohp' => 'required|numeric'
            ]);
            $cif = $request->cif;
            $nohp = $request->nohp;
            $payload = [
                "cif" => $request->cif,
                "nohp" => $request->nohp
            ];
            // dd($payload);
            $data = $this->jwt($payload);
            $form = [
                'method' => 'register_cek_lupapassword',
                'orderdata' => $data
            ];
            $body = $this->apiCekResetPin($form);
            $data = json_decode($body, true);
            $key = $data["status"];
            // dd($data);
            if ($key == "00") {
                // dd($data);
                Session::push('cekResetPin', $payload);
                Session::push('lupaPin', true);
                // dd(session('cekResetPin'));
                // return $this->nextOtp($data);
                return redirect()->route('getOtpPin');
            } else {
                $message = $data['message'];
                return redirect()->back()->with('error', $message);
            }
        } else {
            $data = Session::get('login');
            if ($data != null) return redirect(route('login'));
            // if ($data != null) return redirect()->back();
            return view('auth.pin-cek');
        }
    }
}
