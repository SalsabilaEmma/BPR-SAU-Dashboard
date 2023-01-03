<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Redirect;

class loginController extends Controller
{

    public function index()
    {
        $data = Session::get('login');
        if ($data != null) return redirect(route('login'));
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            if ($request != NULL) {
                Session::forget('login');
                $request->validate([
                    'cif' => 'required|numeric',
                    'password' => 'required',
                    'captcha' => 'required'
                ]);
                // dd($request);

                $cif = $request->cif;
                $password = $request->password;
                $captcha = $request->captcha;

                $payload = [
                    "cif" => $request->cif,
                    "password" => $request->password
                ];
                $data = $this->jwt($payload);
                $form = [
                    'method' => 'login',
                    'orderdata' => $data
                ];

                $body = $this->apiRequest($form);
                $data = json_decode($body, true);
                $key = $data["status"];
                $data['pas'] = encrypt($request->password);
                // Session::push('login', $data);
                // Session::push('isLogin', true);

                $sess_index = session::get('data_recapt');
                if ($captcha == $sess_index) {
                    if ($key == "00") {
                        Session::push('login', $data);
                        Session::push('isLogin', true);
                        // Session::forget('data_recapt');

                        return $this->dashboard($data);
                    } elseif ($key == "03") {
                        // dd('key nya 03 ya');
                        $message = $data['message'];
                        return redirect()->back()->with('error', $message);
                    } else {
                        $message = $data['message'];
                        return redirect()->back()->with('error', $message);
                    }
                    return back();
                } else {
                    return redirect()->back()->with('error', 'Captcha Salah!');
                }
            }
        } else {
            // if method GET
            if (Session::get('login') == NULL) {
                return back();
            }
            $data = Session::get('login')[0];
            $message = $data['message'];
            return view('index', compact('data'))->with('error', $message);
        }
    }

    public function dashboard($data)
    {
        $data = Session::get('login')[0];
        $message = $data['message'];
        return view('index', compact('data'))->with('error', $message);
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}
