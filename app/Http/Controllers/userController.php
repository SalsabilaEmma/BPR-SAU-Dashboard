<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
    public function index()
    {
        return view('index');
    }

    // public function login()
    // {
    //     return view('auth.login');
    // }
    public function storeLogin(Request $request) {
        
        $cif = '10100004096';
        $pass = 'Tes123';
        if (isset($_POST['submit'])) {
            if ($_POST['cif'] == $cif && $_POST['pass'] == $pass){
                //Membuat Session
                // $_SESSION["cif"] = $cif; 
                return view('index');
                /*Jika Ingin Pindah Ke Halaman Lain*/
                // header("Location: admin.php"); //Pindahkan Kehalaman Admin
            } else {
                // Tampilkan Pesan Error
                // display_login_form();
                echo '<p>cif Atau pass Tidak Benar</p>';
            }
        }    
    }

    public function registrasi_baru()
    {
        return view('auth.registrasi-baru');
    }
    public function registrasi_form()
    {
        $payload = Session::get('register')[0];
        return view('auth.registrasi-form', compact('payload'));
    }
    public function otp()
    {
        $payload = Session::get('register')[0];
        return view('auth.otp', compact('payload'));
    }

    public function saldo()
    {
        return view('saldo');
    }
    public function mutasi()
    {
        return view('mutasi');
    }
}
