<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\DaftarTabunganController;
use App\Http\Controllers\RegisterformController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// em-V1
// Route::post('/login', [loginController::class, 'login'])->name('login');
// Route::get('/daftar-tabungan', [DaftarTabunganController::class, 'daftarTabungan'])->name('daftarTabungan');

// $dataa = new loginController();


Route::post('/cek-registration-form', [RegisterformController::class, 'regisCekApi'])->name('regisCekApi');
