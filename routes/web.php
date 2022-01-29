<?php

use Illuminate\Support\Facades\Route;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/authentication', [App\Http\Controllers\SmsAuthenticationController::class, 'index'])->name('authentication');
Route::post('/sms-auth-register', [App\Http\Controllers\Auth\RegisterController::class, 'verify'])->name('sms-auth');
Route::post('/sms-auth', [App\Http\Controllers\Auth\LoginController::class, 'verify'])->name('sms-auth-login');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
