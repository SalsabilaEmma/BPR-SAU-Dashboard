<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OtpController extends Controller
{
    public function index() {
        $payload = Session::get('register')[0];
        return view('auth.otp', compact('payload'));
    }

    public function getOtp(Request $request)
    {
        if ($request->isMethod('POST')) {
            // Session::forget('getOtp');
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
            $data = $this->jwt($payload);
            $form = [
                'method' => 'verifikasi_otp',
                'orderdata' => $data
            ];
            $body = $this->apiRequestOtp($form);
            $data = json_decode($body, true);
            $key = $data["status"];
            $data['pas'] = encrypt($request->password);

            // Session::push('login', $data);
            // Session::push('isLogin', true);
            // dd($data);
            if ($key == "00") {
                // dd($key);
                // Session::push('register', $payload);
                Session::push('isPart2', true);
                return redirect()->route('getRegisForm');
            } elseif ($key == "03") {
                $message = $data['message'];
                return redirect()->back()->with('error', $message);
            } else {
                $message = $data['message'];
                return redirect()->back()->with('error', $message);
            }
            return back();
        } else {
            $payload = Session::get('register')[0];
            return view('auth.otp', compact('payload'));

        }

    }
}
