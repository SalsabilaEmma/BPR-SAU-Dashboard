<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Firebase\JWT\JWT;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function secret()
    {
        return 'c3b268862bb6af823702144a52b39a1c31dd5441b968d6b5efdb925d6ef5f66d';
    }
    public function head()
    {
        return [
            "alg" => "HS256",
            "typ" => "JWT"
        ];
    }
    public function jwt($payload)
    {
        return JWT::encode($payload, $this->secret(), 'HS256', null, $this->head());
    }

    // This API DASHBOARD BPR SAU DEVELOPER
    public function apiRequest($request)
    {
        $payload = $request;
        $data = [
            "method" => "login",
            "orderdata" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJjaWYiOiIxMDEwMDAwNDA5NiIsInBhc3N3b3JkIjoiVGVzMTIzIn0.YHQ0ETQ8fPlwGQn0EeqEIZLLuQWytsSUHUCZQiLau_o"

        ];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://dashboardapi.bprsau.com:8080/online/v1/app', [
            "json" => $request
        ]);
        $body = $response->getBody();

        return $body;
    }

    public function apiRequestRegisCek($request)
    {
        $payload = $request;
        $data = [
            "method" => "register_cek",
            "orderdata" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJjaWYiOiIxMDEwMDAwNDA5NiIsIm5vaHAiOiIwODIyNTc3Mzk2MDAifQ.xY8momzdaC7JehOluUTyD1ocAW__7PfAi0NYvQqchmM"

        ];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://dashboardapi.bprsau.com:8080/online/v1/app', [
            "json" => $request
        ]);
        $body = $response->getBody();

        return $body;
    }

    public function apiRequestOtp($request)
    {
        $payload = $request;
        $data = [
            "method" => "verifikasi_otp",
            "orderdata" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJjaWYiOiIxMDEwMDAwNDA5NiIsIm5vaHAiOiIwODIyNTc3Mzk2MDAiLCJvdHAiOiIxMjM0In0.Nup3htLqcVhtDVPl8NxhTYBiqnqF2bsfcgONo9NYzxc"

        ];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://dashboardapi.bprsau.com:8080/online/v1/app', [
            "json" => $request
        ]);
        $body = $response->getBody();

        return $body;
    }

    public function apiRequestRegisForm($request)
    {
        $payload = $request;
        $data = [
            "method" => "register",
            "orderdata" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJjaWYiOiIxMDEwMDAwNDA5NiIsIm5vaHAiOiIwODIyNTc3Mzk2MDAiLCJwYXNzd29yZCI6IlRlczEyMyJ9.fe2HcbqKnPF6cwuOkYu3el9MjDxAtgnVsGlD1xw7T8g"

        ];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://dashboardapi.bprsau.com:8080/online/v1/app', [
            "json" => $request
        ]);
        $body = $response->getBody();

        return $body;
    }

    public function apiCekResetPass($request)
    {
        $payload = $request;
        $data = [
            "method" => "register_cek_lupapassword",
            "orderdata" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJjaWYiOiIxMDEwMDAwNDA5NiIsIm5vaHAiOiIwODIyNTc3Mzk2MDAifQ.xY8momzdaC7JehOluUTyD1ocAW__7PfAi0NYvQqchmM"

        ];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://dashboardapi.bprsau.com:8080/online/v1/app', [
            "json" => $request
        ]);
        $body = $response->getBody();

        return $body;
    }

    public function apiResetPass($request)
    {
        $payload = $request;
        $data = [
            "method" => "reset_password",
            "orderdata" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJjaWYiOiIxMDEwMDAwNDA5NiIsIm5vaHAiOiIwODIyNTc3Mzk2MDAiLCJwYXNzd29yZF9iYXJ1IjoiVGVzMTIzIn0.LmGSdL0eOIW2v3ye8XOvDOz_wl6Ye87P80kJVdjCUCA"

        ];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://dashboardapi.bprsau.com:8080/online/v1/app', [
            "json" => $request
        ]);
        $body = $response->getBody();

        return $body;
    }
    // otp sama
    public function apiCekResetPin($request)
    {
        $payload = $request;
        $data = [
            "method" => "register_cek_lupapassword",
            "orderdata" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJjaWYiOiIxMDEwMDAwNDA5NiIsIm5vaHAiOiIwODIyNTc3Mzk2MDAifQ.xY8momzdaC7JehOluUTyD1ocAW__7PfAi0NYvQqchmM"

        ];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://dashboardapi.bprsau.com:8080/online/v1/app', [
            "json" => $request
        ]);
        $body = $response->getBody();

        return $body;
    }

    public function apiResetPin($request)
    {
        $payload = $request;
        $data = [
            "method" => "request_otp_flagpin",
            "orderdata" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJjaWYiOiIxMDEwMDAwNDA5NiIsIm5vaHAiOiIwODIyNTc3Mzk2MDAiLCJvdHAiOiIxMjM0IiwiYWN0aW9uIjoiUkVTRVRQSU4ifQ.6n85QTlEchVPHuoDftz_wnsUOTukWllcn1nG2bggsx4"

        ];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://dashboardapi.bprsau.com:8080/online/v1/app', [
            "json" => $request
        ]);
        $body = $response->getBody();

        return $body;
    }

    //
    public function apiRequestTabungan($request)
    {
        $payload = $request;
        $data = [
            "method" => "get_tabungan",
            "orderdata" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJjaWYiOiIxMDEwMDAwNDA5NiJ9.SdSwAhLald8iDfWXPBLN69BbWMlFDeujWexcSH9u9M0"
        ];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://dashboardapi.bprsau.com:8080/online/v1/app', [
            "json" => $request
        ]);
        $body = $response->getBody();

        return $body;
    }

    public function apiRequestMutasi($request)
    {
        $payload = $request;
        $data = [
            "method" => "get_mutasi_tabungan",
            "orderdata" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyZWtlbmluZyI6IjEwMTEwMDEwMjkyIiwidGdsYXdhbCI6IjIwMjItMDgtMTIiLCJ0Z2xha2hpciI6IjIwMjItMDgtMTIifQ.mGdTfiffqpcGYnnSvZNvk3Y34Xl299jNICt_CW1aUFc"
        ];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://dashboardapi.bprsau.com:8080/online/v1/app', [
            "json" => $request
        ]);
        $body = $response->getBody();

        return $body;
    }

    public function apiGetSaldoTabunganPin($request)
    {
        $payload = $request;
        $data = [
            "method" => "get_saldotabunganpin",
            "orderdata" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJjaWYiOiIxMDEwMDAwNDA5NiIsInBpbiI6Ijk5OTg4OCJ9.NRkWLHVrWQDu3ImsFyTIkDnE8rutHWH_vVZlVm37prY"
        ];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://dashboardapi.bprsau.com:8080/online/v1/app', [
            "json" => $request
        ]);
        $body = $response->getBody();

        return $body;
    }

    public function apiGetMutasiTopup($request)
    {
        $payload = $request;
        $data = [
            "method" => "get_mutasitopup",
            "orderdata" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJjaWYiOiIxMDEwMDAwNDA5NiIsInRnbGF3YWwiOiIyMDIyLTA5LTEzIiwidGdsYWtoaXIiOiIyMDIyLTA5LTEzIn0.3zMbPIWGNXTHpiBgg_fXpkQtQsbIDl6_Bjf9Eq-w2Rw"
        ];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://dashboardapi.bprsau.com:8080/online/v1/app', [
            "json" => $request
        ]);
        $body = $response->getBody();

        return $body;
    }

    public function apiGetDaftarProduk($request)
    {
        // $payload = $request;
        $data = [
            "method" => "get_daftarproduk",
            // "orderdata" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJjaWYiOiIxMDEwMDAwNDA5NiIsInRnbGF3YWwiOiIyMDIyLTA5LTEzIiwidGdsYWtoaXIiOiIyMDIyLTA5LTEzIn0.3zMbPIWGNXTHpiBgg_fXpkQtQsbIDl6_Bjf9Eq-w2Rw"
        ];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://dashboardapi.bprsau.com:8080/online/v1/app', [
            "json" => $request
        ]);
        $body = $response->getBody();

        return $body;
    }

    public function apiPostTopup($request)
    {
        $payload = $request;
        $data = [
            "method" => "post_topup",
            "orderdata" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyZWtlbmluZyI6IjEwMTEwMDA0MDQwIiwiaWRwZWwiOiIwODIyNTc3Mzk2MDAiLCJrb2RlcHJvZHVrIjoiU0NJTjEwMDBIIiwicGluIjoiOTk5ODg4In0.JkfFWG3JeuSot5P_y6t_Mf1c0mvTaodJFXyjrt6OL2E"
        ];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://dashboardapi.bprsau.com:8080/online/v1/app', [
            "json" => $request
        ]);
        $body = $response->getBody();

        return $body;
    }
}
