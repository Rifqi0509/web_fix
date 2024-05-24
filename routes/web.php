<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\Akun_vipController;
use App\Http\Controllers\DetailVipController;
use App\Http\Controllers\VipController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SurveyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/Daftar-Tamu-Kunjungan', [FormulirController::class, 'daftar'])->name('daftartamukunjungan');
Route::get('/Survey-Kepuasan-Pengguna', [SurveyController::class, 'survey'])->name('surveypengguna');
// Route::get('/Survey-Kepuasan-Pengguna', [FormulirController::class, 'submitForm']);
Route::match(['get', 'post'], '/Input-Vip', [HomeController::class, 'codevip'])->name('codevip');
Route::get('/Verifikasi-Vip', [DetailVipController::class, 'verifikasi'])->name('verifikasi');
// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/daftar', [FormulirController::class, 'storeForm']);
Route::get('/Formulir-Tamu', [FormulirController::class, 'index'])->name('form-kunjungan');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/table', [HomeController::class, 'tabler'])->name('table');
Route::get('/element', [VisitorController::class, 'index'])->name('element');
Route::get('/Struktur-organisasi', [HomeController::class, 'struktur'])->name('struktur')->middleware('auth.admin');
Route::post('/tambahdata', [VisitorController::class, 'store'])->name('tambahdata');

Route::middleware(['auth:admins', 'auth.admin'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});

Route::middleware(['auth:admins', 'auth.superadmin'])->group(function () {
    Route::get('/dashboard_master', [HomeController::class, 'superadmin'])->name('dashboard_master');
    Route::controller(ProfileController::class)->group(function () {
        Route::resource('/profile', ProfileController::class);
        Route::get('/cetak-profile', 'cetak')->name('cetak-profile');
        Route::get('/excel-profile', 'xlsx')->name('excel-profile');
    });
});

Route::controller(ProfileController::class)->group(function () {
    Route::resource('/profile', ProfileController::class);
    Route::get('/cetak-profile', 'cetak')->name('cetak-profile');
    Route::get('/excel-profile', 'xlsx')->name('excel-profile');
    Route::get('/all-profile-names', 'getAllProfileNames')->name('all-profile-names');
});

Route::controller(VipController::class)->group(function () {
    Route::resource('/vip', VipController::class);
    Route::get('/cetak-vip-form', 'cetakForm')->name('cetak-vip-form');
    Route::get('/cetak-vip-tanggal/{tanggalAwal}/{tanggalAkhir}', 'cetakTanggal')->name('cetak-vip-tanggal');
    Route::get('/excel-vip', 'xlsx')->name('excel-vip');
    Route::get('/all-vip-names', 'getAllVipNames')->name('all-vip-names');
});

Route::controller(UserController::class)->group(function () {
    Route::resource('/akun_vip', UserController::class);
    Route::get('/cetak-akun_vip', 'cetak')->name('cetak-akun_vip');
    Route::get('/cetak-akun-tanggal/{tanggalAwal}/{tanggalAkhir}', 'cetakTanggal')->name('cetak-akun-tanggal');
    Route::get('/excel-akun', 'xlsx')->name('excel-akun');
    Route::get('/all-akun_vip-names', 'getAllAkun_VipNames')->name('all-akun_vip-names');
});

Route::controller(VisitorController::class)->group(function () {
    Route::get('/cetak-tamu-form', 'cetakForm')->name('cetak-tamu-form');
    Route::get('/cetak-tamu-tanggal/{tanggalAwal}/{tanggalAkhir}', 'cetakTanggal')->name('cetak-tamu-tanggal');
    Route::get('/excel-kunjungan', 'xlsx')->name('excel-kunjungan');
    Route::get('/all-visitor-names', 'getAllVisitorNames')->name('all-visitor-names');
});

Route::controller(SurveyController::class)->group(function () {
    Route::resource('/survey', SurveyController::class);
    Route::get('/cetak-questions', 'cetak')->name('cetak-questions');
    Route::get('/cetak-survey-tanggal/{tanggalAwal}/{tanggalAkhir}', 'cetakTanggal')->name('cetak-survey-tanggal');
    Route::get('/excel-questions', 'xlsx')->name('excel-questions');
});

Route::controller(FeedbackController::class)->group(function () {
    Route::resource('/feedback', FeedbackController::class);
    Route::get('/cetak-feedback-form', 'cetakForm')->name('cetak-feedback-form');
    Route::get('/cetak-feedback-tanggal/{tanggalAwal}/{tanggalAkhir}', 'cetakTanggal')->name('cetak-feedback-tanggal');
    Route::get('/excel-feedback', 'xlsx')->name('excel-feedback');
});
