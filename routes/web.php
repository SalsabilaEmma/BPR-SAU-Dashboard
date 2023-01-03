<?php

use Illuminate\Support\Facades\Route;
// use Request;
use App\Http\Controllers\loginController;
use App\Http\Controllers\DaftarTabunganController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\ForgetPinController;
use App\Http\Controllers\MutasiTabunganController;
use App\Http\Controllers\registercekController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\OtpPassController;
use App\Http\Controllers\OtpPinController;
use App\Http\Controllers\RegisterformController;
use App\Http\Controllers\RecaptchaController;
use App\Http\Controllers\TopupController;
use App\Http\Controllers\NewPassController;

/* End of file Controllername.php */

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// View tanpa return. format -> Route::view('url', "direktori_page");

Route::get('/logout', [loginController::class, 'logout'])->name('logout');
// Route::view('/', "auth/login")->name('viewLogin');
Route::any('/', [loginController::class, 'index'])->name('viewLogin');
Route::any('/dashboard', [loginController::class, 'login'])->name('login');

Route::get('/view-captcha', [RecaptchaController::class, 'index'])->name('view-captcha');
Route::get('/get-captcha', [RecaptchaController::class, 'get_recaptcha'])->name('get-captcha');
Route::post('/cek-captcha', [RecaptchaController::class, 'cek_recaptcha'])->name('cek-captcha');

Route::any('/lupa-pin', [ForgotController::class, 'cekResetPin'])->name('resetPin'); //cek cif nomor
Route::view('/reset-pin', "auth/pin-cek")->name('viewNewPin');
Route::view('/reset-pass', "auth/pass-reset")->name('viewNewPin');

Route::any('/lupa-password', [ForgotController::class, 'cekReset'])->name('resetPass'); //cek cif nomor
Route::view('/lupa-password', "auth/pass-cek")->name('viewResetPass');
Route::middleware('lupa-pass')->group(function () {
    // Route::get('/otp', [OtpController::class, 'index'])->name('otp');
    Route::any('/otp-password', [OtpPassController::class, 'getOtpPass'])->name('getOtpPass');
});
Route::middleware('new-pass')->group(function () {
    // Route::get('/form-registration', [RegisterformController::class, 'index'])->name('registrasi-form');
    Route::any('/new-password', [NewPassController::class, 'newPass'])->name('newPass');
});

Route::any('/lupa-pin', [ForgetPinController::class, 'cekResetPin'])->name('resetPin'); //cek cif nomor
Route::view('/lupa-pin', "auth/pin-cek")->name('viewResetPin');
Route::middleware('lupa-pin')->group(function () {
    // Route::get('/otp', [OtpController::class, 'index'])->name('otp');
    Route::any('/otp-pin', [OtpPinController::class, 'getOtpPin'])->name('getOtpPin');
});
// Route::middleware('new-pin')->group(function () {
//     // Route::get('/form-registration', [RegisterformController::class, 'index'])->name('registrasi-form');
//     Route::any('/new-pin', [NewPassController::class, 'newPass'])->name('newPass');
// });


Route::any('/new-registration', [registercekController::class, 'getRegisCek'])->name('regisCek'); //post
Route::middleware('regis')->group(function () {

    // Route::get('/otp', [OtpController::class, 'index'])->name('otp');
    Route::any('/otp', [OtpController::class, 'getOtp'])->name('getOtp');
});

Route::middleware('form-regis')->group(function () {
    // Route::get('/form-registration', [RegisterformController::class, 'index'])->name('registrasi-form');
    Route::any('/form-registration', [RegisterformController::class, 'getRegisForm'])->name('getRegisForm');
});

Route::middleware('login')->group(function () {
    Route::view('/try', "sby-pay.pdf-invoice");
    // Route::post('/dashboard', [loginController::class, 'login'])->name('login');
    // Route::get('/dashboards', [loginController::class, 'dashboard'])->name('dashboard');
    Route::view('rekening', "rekening")->name('rekening');
    Route::get('/saldo-tabungan', [DaftarTabunganController::class, 'daftarTabungan'])->name('daftarTabungan');

    Route::any('/saldo-tabungan/view', [DaftarTabunganController::class, 'get_saldotabunganpin'])->name('saldoTabunganPin');

    // Route::post('/mutasi-rekening', [MutasiTabunganController::class, 'getMutasi'])->name('getMutasi'); //asli
    Route::any('/mutasi-rekening', [MutasiTabunganController::class, 'getMutasi'])->name('getMutasi');
    Route::any('/mutasi-rekening/cetakpdf', [MutasiTabunganController::class, 'cetakPdf'])->name('cetakPdf');
    Route::any('/mutasi-rekening/exportexcel', [MutasiTabunganController::class, 'exportExcel'])->name('exportExcel');

    Route::view('suroboyo-pay', "sby-pay.sbypay-page")->name('sby-pay');

    Route::any('/suroboyo-pay', [TopupController::class, 'getMutasiTopup'])->name('getMutasiTopup');
    Route::any('/suroboyo-pay/cetakpdf', [TopupController::class, 'cetakPdf'])->name('cetakPdfTopup');
    Route::any('/suroboyo-pay/exportexcel', [TopupController::class, 'exportExcel'])->name('exportExcelTopup');

    Route::any('/data-topup', [TopupController::class, 'getDataTopup'])->name('getDataTopup');
    Route::any('/data-topup-pin', [TopUpController::class, 'bayarPin'])->name('bayarPin');
    // Route::get('/validate', [TopupController::class, 'getDataTopup'])->name('validate');

    Route::any('/post-topup', [TopupController::class, 'postTopup'])->name('postTopup');
    Route::any('/invoice-topup', [TopupController::class, 'invoiceTopup'])->name('invoiceTopup');

});
