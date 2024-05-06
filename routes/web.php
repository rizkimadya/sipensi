<?php

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

// authetication
Route::get('/login', [AuthController::class, 'login']);
Route::get('/regis', [AuthController::class, 'regis']);


Route::get('/', [UserController::class, 'home']);
Route::get('/properties', [UserController::class, 'properties']);
Route::get('/properties/details', [UserController::class, 'detailProperties']);
Route::get('/contact', [UserController::class, 'contact']);
