<?php
use App\Http\Controllers\InformationController;
use Modules\FacultyMember\Http\Controllers\MessageController;
use Modules\FacultyMember\Http\Controllers\FacultyMemberController;
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

Route::prefix('facultymember')->middleware('faculty_member')->group(function() {
    Route::get('/', [FacultyMemberController::class, 'index'])->name('faculty_member_home');

    Route::get('/all_messages', [MessageController::class, 'index'])->name('all_messages');
    Route::get('/show_conversation/{id}', [MessageController::class, 'show'])->name('show_conversation');
    Route::get('/reply_message', [MessageController::class, 'reply'])->name('reply_message');

    Route::get('/my_messages', [MessageController::class, 'myMessages'])->name('my_messages');

    Route::get('/new_message', [MessageController::class, 'create'])->name('new_message');
    Route::post('/store/message', [MessageController::class, 'store'])->name('store_message');

    Route::get('/broadcast', [MessageController::class, 'broadcast'])->name('broadcast');
    Route::post('/store/broadcast', [MessageController::class, 'storeBroadcast'])->name('store_broadcast');


    Route::get('/studentInfo/{email}/{id}', [InformationController::class, 'studentInfo'])->name('show_student_info');

    Route::get('/course/sections/{id}', [MessageController::class, 'getSections'])->name('getSections');
    Route::get('/section/students/{id}', [MessageController::class, 'getStudents'])->name('getStudents');

    Route::get('/show_message/{id}', [MessageController::class, 'show'])->name('show_message');
    Route::get('/show_notify/{id}/{m}', [MessageController::class, 'show'])->name('show_notify');
});
