<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Session;

class registercekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Session::get('login');
        if ($data != null) return redirect(route('login'));

        return view('auth.registrasi-baru');
    }

    public function getRegisCek(Request $request)
    {
        if ($request->isMethod('POST')) {

            Session::forget('getRegisCek');
            $request->validate([
                'cif' => 'required|numeric',
                'nohp' => 'required|numeric',
                // 'g-recaptcha-response' => 'required|captcha'
            ]);
            // dd($request);
            $cif = $request->cif;
            $nohp = $request->nohp;

            $payload = [
                "cif" => $request->cif,
                "nohp" => $request->nohp
            ];
            $data = $this->jwt($payload);
            $form = [
                'method' => 'register_cek',
                'orderdata' => $data
            ];

            $body = $this->apiRequestRegisCek($form);
            $data = json_decode($body, true);
            $key = $data["status"];
            // dd($key);
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
            return view('auth.registrasi-baru');
        }
    }
}
