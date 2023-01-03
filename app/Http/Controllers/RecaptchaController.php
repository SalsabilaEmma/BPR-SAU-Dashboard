<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RecaptchaController extends Controller
{
    public function __construct()
    {
        $this->capt = "";
    }
    public function index()
    {
        return view('captcha');
    }
    public function get_recaptcha()
    {
        // fungsi iki gak jalan loh, nek ikine?
        $arr = array();
        for ($i = 0; $i <= 4; $i++) {
            //make random number
            $random_number = $this->__get_random_number();
            if (isset($arr)) {
                //perulangan untuk menghindari value angka sama
                while (in_array($random_number, $arr)) {
                    $random_number = $this->__get_random_number();
                }
            }
            array_push($arr,  $random_number);
        }
        $random_index = rand(0, 4);
        session(['data_recapt' => $random_index]);
        $data = array(
            'rc' => $arr[$random_index],
            'captcha' => $arr
        );
        return json_encode($data);
    }

    public function __get_random_number()
    {
        $random_number = rand(10, 99);
        return $random_number;
    }

    public function cek_recaptcha(Request $request)
    {
        // Session::forget('cek_recaptcha');
        $recaptcha_index = $request->input('recaptcha');
        $sess_index = session::get('data_recapt');
        // dd(session('get_recaptcha'));
        // var_dump($recaptcha_index);
        // dd(['sess_index' => $sess_index, 'recaptcha_index' => $recaptcha_index]);

        if ($recaptcha_index != NULL) {
            if ($recaptcha_index == $sess_index) {
                // Session::forget('get_recaptcha');
                // $message = 'Captcha Benar yey !';
                Session::forget('cek_recaptcha');
                return response()->json([
                    'success' => true
                ]);
            } else {
                Session::forget('cek_recaptcha');
                return response()->json([
                    'success' => false
                ]);
            }
        } else {
            // $message = 'Captcha Kosong !';
            Session::forget('cek_recaptcha');
            return response()->json([
                'success' => false
            ]);
            // return redirect()->back();
        }
        Session::forget('cek_recaptcha');
    }
}
