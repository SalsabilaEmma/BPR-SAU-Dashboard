<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterformController extends Controller
{
    public function index()
    {
        $payload = Session::get('register')[0];
        return view('auth.registrasi-form', compact('payload'));
    }

    public function getRegisForm(Request $request)
    {
        if ($request->isMethod('POST')) {

            // Session::forget('getRegisForm');
            $request->validate([
                'cif' => 'required|numeric',
                'nohp' => 'required|numeric',
                'password' => 'required'
            ]);
            $cif = $request->cif;
            $nohp = $request->nohp;
            $password = $request->password;
            $password2 = $request->password2;

            $payload = [
                "cif" => $request->cif,
                "nohp" => $request->nohp,
                "password" => $request->password
            ];
            $data = $this->jwt($payload);
            $form = [
                'method' => 'register',
                'orderdata' => $data
            ];
            $body = $this->apiRequestRegisForm($form);
            $data = json_decode($body, true);
            $key = $data["status"];
            $data['pas'] = encrypt($request->password);
            // Session::push('login', $data);
            // Session::push('isLogin', true);

            if ($key == "00") {
                if ($password == $password2) {
                    // dd('ayaya');
                    Session::flush();
                    return redirect()->route('viewLogin');
                } else {
                    $message = 'Password Tidak Sama !';
                    return redirect()->back()->with('error', $message);
                }
            } elseif ($key == "03" || $key == '01E') {
                $message = $data['message'];
                return redirect()->back()->with('error', $message);
            } else {
                $message = $data['message'];
                return redirect()->back()->with('error', $message);
            }
            return back();
        } else {
            $payload = Session::get('register')[0];
            return view('auth.registrasi-form', compact('payload'));
        }
    }

    public function regisCekApi(Request $request)
    {
        Session::forget('regisCekApi');
        $request->validate([
            'cif' => 'required',
            'nohp' => 'required'
        ]);
        $cif = $request->cif;
        $nohp = $request->nohp;

        $payload = [
            "cif" => $request->cif,
            "nohp" => $request->nohp
        ];
        $data = $this->jwt($payload);
        $form = [
            'method' => 'register_cek_noflagotp',
            'orderdata' => $data
        ];

        $body = $this->apiRequestRegisCek($form);
        $data = json_decode($body, true);
        $key = $data["status"];
        // dd($key);
        $data['pas'] = encrypt($request->password);

        if ($key == "00") {
            return response()->json([
                'data' => $data
            ]);
        } else {
            return response()->json(['error' => 'Gagal']);
        }
    }
}
