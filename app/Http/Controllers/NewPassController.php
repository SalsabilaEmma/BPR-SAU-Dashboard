<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewPassController extends Controller
{
    public function index()
    {
        $payload = Session::get('register')[0];
        return view('auth.pass-reset', compact('payload'));
    }

    public function newPass(Request $request)
    {
        if ($request->isMethod('POST')) {
            // dd($request->all());
            // Session::forget('getRegisForm');
            $request->validate([
                'password_baru' => 'required',
                'password_baru2' => 'required'
            ]);
            $cif = $request->cif;
            $nohp = $request->nohp;
            $password_baru = $request->password_baru;
            $password_baru2 = $request->password_baru2;

            $payload = [
                "cif" => $request->cif,
                "nohp" => $request->nohp,
                "password_baru" => $request->password_baru,
                // "password2" => $request->password2,
            ];
            // dd($payload);
            $data = $this->jwt($payload);
            $form = [
                'method' => 'reset_password',
                'orderdata' => $data
            ];
            $body = $this->apiResetPass($form);
            $data = json_decode($body, true);
            $key = $data["status"];
            $data['pas'] = encrypt($request->password_baru);
            // dd($data);
            // Session::push('login', $data);
            // Session::push('isLogin', true);

            if ($key == "00") {
                if ($password_baru == $password_baru2) {
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
            // dd('get ni');
            $payload = Session::get('cekReset')[0];
            return view('auth.pass-reset', compact('payload'));
        }
    }
}
