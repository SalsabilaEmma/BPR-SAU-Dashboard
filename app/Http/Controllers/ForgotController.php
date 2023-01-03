<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Session;

class ForgotController extends Controller
{

    public function index()
    {
        $data = Session::get('login');
        if ($data != null) return redirect(route('viewResetPass'));

        return view('auth.pass-cek');
    }

    public function cekReset(Request $request)
    {
        if ($request->isMethod('POST')) {
            Session::forget('cekReset');
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
            $data = $this->jwt($payload);
            $form = [
                'method' => 'register_cek_lupapassword',
                'orderdata' => $data
            ];
            $body = $this->apiCekResetPass($form);
            $data = json_decode($body, true);
            $key = $data["status"];
            // dd($data);
            if ($key == "00") {
                // dd($data);
                Session::push('cekReset', $payload);
                Session::push('lupaPass', true);
                // dd(session('cekReset'));
                // return $this->nextOtp($data);
                return redirect()->route('getOtpPass');
                // return redirect()->guest('otp-password')->with('_method', session('url.entended.method', 'POST'));
            } else {
                $message = $data['message'];
                return redirect()->back()->with('error', $message);
            }
        } else {
            $data = Session::get('login');
            if ($data != null) return redirect(route('login'));
            // if ($data != null) return redirect()->back();
            return view('auth.pass-cek');
        }
    }

    public function nextOtp($data)
    {
        $data = Session::get('cekReset')[0];
        return redirect()->route('getOtpPass', compact('data'));
    }

    public function getResetPass(Request $request)
    {

        if ($request->isMethod('POST')) {

            // Session::forget('getResetPass');
            $request->validate([
                'cif' => 'required|numeric',
                'nohp' => 'required|numeric',
                'password_baru' => 'required'
            ]);
            $cif = $request->cif;
            $nohp = $request->nohp;
            // $password_baru = $request->password_baru;

            $payload = [
                "cif" => $request->cif,
                "nohp" => $request->nohp,
                "password_baru" => $request->password_baru
            ];
            $data = $this->jwt($payload);
            $form = [
                'method' => 'reset_password',
                'orderdata' => $data
            ];

            $body = $this->apiResetPass($form);
            $data = json_decode($body, true);
            $key = $data["status"];
            dd($data);
            $data['pas'] = encrypt($request->password);

            if ($key == "00") {
                // dd($key);
                Session::push('register', $payload);
                Session::push('isPart1', true);
                return redirect()->route('getOtp');
            } elseif ($key == "03") {
                $message = $data['message'];
                return redirect()->back()->with('error', $message);
            } else {
                $message = $data['message'];
                return redirect()->back()->with('error', $message);
            }
            return back();
        } else {
            $data = Session::get('login');
            if ($data != null) return redirect(route('login'));
            // if ($data != null) return redirect()->back();
            return view('auth.pass-cek');
        }
    }

}
