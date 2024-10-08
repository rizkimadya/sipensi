<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VillaController;
use Illuminate\Support\Facades\Route;

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

// authentication
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/regis', [AuthController::class, 'regis']);
Route::post('/login', [AuthController::class, 'postLogin']);
Route::post('/regis', [AuthController::class, 'postRegis']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/', [UserController::class, 'home']);
Route::get('/spk', [UserController::class, 'spkForm'])->name('spk.form');
Route::post('/spk', [UserController::class, 'spk'])->name('spk');
Route::get('/villa', [UserController::class, 'villa']);

Route::post('/upload', [VillaController::class, 'upload'])->name('ckeditor.upload');

Route::group(['middleware' => ['auth', 'Roles:admin']], function () {
    Route::get('/dashboard-admin', [DashboardController::class, 'admin']);

    // villa
    Route::get('/admin/villa', [AdminController::class, 'indexVilla']);
    Route::post('/admin/villa', [VillaController::class, 'store']);
    Route::get('/admin/villa/show/{id}', [VillaController::class, 'show']);
    Route::get('/admin/villa/edit/{id}', [VillaController::class, 'edit']);
    Route::post('/admin/villa/update/{id}', [VillaController::class, 'update']);
    Route::get('/admin/villa/delete/{id}', [VillaController::class, 'destroy']);

    // pemilik villa
    Route::get('/admin/pemilik-villa', [AdminController::class, 'indexPemilik']);

    // penyewa villa
    Route::get('/admin/penyewa-villa', [AdminController::class, 'indexPenyewa']);

    // transaksi
    Route::get('/admin/transaksi', [AdminController::class, 'indexTransaksi']);
});

Route::group(['middleware' => ['auth', 'Roles:pemilik']], function () {
    Route::get('/dashboard-pemilik', [DashboardController::class, 'pemilik']);

    // villa
    Route::get('/pemilik/villa', [VillaController::class, 'index']);

    // transaksi
    Route::get('/pemilik/transaksi', [TransaksiController::class, 'pemilikIndex']);
});

Route::get('/detail-villa/{id}', [UserController::class, 'detailVilla']);

Route::group(['middleware' => ['auth', 'Roles:penyewa']], function () {
    // transaksi
    Route::get('/transaksi', [TransaksiController::class, 'indexUser'])->name("transaksi");
    Route::get('/transaksi/{snapToken}', [CheckoutController::class, 'detailCheckout']);

    // checkout
    Route::post('/checkout', [CheckoutController::class, 'process'])->name("checkout-process");
    Route::get('/checkout/success/{transaction}', [CheckoutController::class, 'successPay']);
});
