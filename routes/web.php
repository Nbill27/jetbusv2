<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\BusController;
use App\Http\Controllers\Admin\TipeBusController;
use App\Http\Controllers\Admin\RuteController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\TiketController;
use App\Http\Controllers\Admin\BangkuController;
use App\Http\Controllers\Admin\TransaksiController as AdminTransaksi;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Pelanggan\DashboardController as PelangganDashboard;
use App\Http\Controllers\Pelanggan\PesanTiketController;
use App\Http\Controllers\Pelanggan\ProfilController;
use App\Http\Controllers\Pelanggan\InvoiceController;
use Illuminate\Support\Facades\Route;

// ==================== PUBLIC ====================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/armada', [HomeController::class, 'armada'])->name('armada');
Route::get('/agen', [HomeController::class, 'agen'])->name('agen');
Route::post('/cari-tiket', [HomeController::class, 'cariTiket'])->name('cari-tiket');

// ==================== AUTH ====================
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// ==================== ADMIN ====================
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
    Route::resource('pengguna', PenggunaController::class)->except(['show']);
    Route::resource('bus', BusController::class)->except(['show'])->parameters(['bus' => 'bu']);
    Route::resource('tipe-bus', TipeBusController::class)->except(['show'])->parameters(['tipe-bus' => 'tipeBu']);
    Route::resource('rute', RuteController::class)->except(['show']);
    Route::resource('jadwal', JadwalController::class)->except(['show']);
    Route::resource('tiket', TiketController::class)->except(['show']);
    Route::get('/bangku', [BangkuController::class, 'index'])->name('bangku.index');
    Route::post('/bangku', [BangkuController::class, 'store'])->name('bangku.store');
    Route::delete('/bangku/{bangku}', [BangkuController::class, 'destroy'])->name('bangku.destroy');
    Route::get('/transaksi', [AdminTransaksi::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/{transaksi}', [AdminTransaksi::class, 'show'])->name('transaksi.show');
    Route::put('/transaksi/{transaksi}', [AdminTransaksi::class, 'update'])->name('transaksi.update');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
});

// ==================== PELANGGAN ====================
Route::prefix('pelanggan')->name('pelanggan.')->middleware(['auth', 'pelanggan'])->group(function () {
    Route::get('/', [PelangganDashboard::class, 'index'])->name('dashboard');
    Route::post('/pesan-tiket', [PesanTiketController::class, 'pilihKursi'])->name('pesan-tiket');
    Route::post('/proses-pesan', [PesanTiketController::class, 'proses'])->name('proses-pesan');
    Route::get('/profil', [ProfilController::class, 'show'])->name('profil');
    Route::put('/profil', [ProfilController::class, 'update'])->name('profil.update');
    Route::put('/profil/password', [ProfilController::class, 'updatePassword'])->name('profil.password');
    Route::get('/invoice/{transaksi}', [InvoiceController::class, 'show'])->name('invoice');
});
