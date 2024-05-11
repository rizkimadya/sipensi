<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
Route::get('/properties', [UserController::class, 'properties']);
Route::get('/properties/details', [UserController::class, 'detailProperties']);
Route::get('/contact', [UserController::class, 'contact']);


Route::group(['middleware' => ['auth', 'Roles:admin']], function () {
    Route::get('/dashboard-admin', [AdminController::class, 'dashboard']);
});
