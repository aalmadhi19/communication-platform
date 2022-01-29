<?php

use Modules\Student\Http\Controllers\MessageController;
use Modules\Student\Http\Controllers\StudentController;

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

Route::prefix('student')->middleware('student')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('student_home');
    Route::get('/all-messages', [MessageController::class, 'allMessages'])->name('all-messages');
    Route::get('/my-messages', [MessageController::class, 'index'])->name('my-messages');
    Route::get('/create-message', [MessageController::class, 'create'])->name('new-message');
    Route::post('/store-message', [MessageController::class, 'store'])->name('store-message');
    Route::get('/show-message/{id}', [MessageController::class, 'show'])->name('show-message');
    Route::get('/show-notify/{id}/{m}', [MessageController::class, 'show'])->name('show-notify');

    Route::get('/reply-message', [MessageController::class, 'reply'])->name('reply-message');

});
