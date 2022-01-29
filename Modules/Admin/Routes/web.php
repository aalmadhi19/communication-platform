<?php

use Modules\Admin\Http\Controllers\AdminController;
use Modules\Course\Http\Controllers\CourseController;
use Modules\Admin\Http\Controllers\FacultyMemberController;

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

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin_home');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs');
    Route::get('set2FA/{val}', [AdminController::class, 'set2FA'])->name('set2FA');

    Route::get('/facultymembers', [AdminController::class, 'facultyMembers'])->name('facultyMembers');
    Route::get('/students', [AdminController::class, 'students'])->name('students');
    Route::get('/courses', [AdminController::class, 'courses'])->name('courses');
    Route::get('/sections', [AdminController::class, 'sections'])->name('sections');

    // admins
    Route::get('/admins', [AdminController::class, 'admins'])->name('admins');
    Route::get('/add/Admin', [AdminController::class, 'addAdmin'])->name('addAdmin');
    Route::post('store/Admin', [AdminController::class, 'storeAdmin'])->name('storeAdmin');
    Route::get('/delete/Admin/{id}', [AdminController::class, 'deleteAdmin'])->name('deleteAdmin');

    // profiles
    Route::get('/student/{id}', [AdminController::class, 'showStudent'])->name('student_profile');
    Route::get('/facultymember/{id}', [AdminController::class, 'showFacultyMember'])->name('facultyMember_profile');


    // Courses
    Route::get('/add/course', [CourseController::class, 'create'])->name('addCourse');
    Route::post('store/course', [CourseController::class, 'store'])->name('storeCourse');
    Route::get('/delete/course/{id}', [CourseController::class, 'delete'])->name('deleteCourse');


    // sections
    Route::get('/add/section/{id}', [CourseController::class, 'createSection'])->name('addSection');
    Route::post('store/section', [CourseController::class, 'storeSection'])->name('storeSection');
    Route::get('/delete/section/{id}', [CourseController::class, 'deleteSection'])->name('deleteSection');


    // add/delete students
    Route::get('/add/student/{section}', [CourseController::class, 'addStudent'])->name('addStudent');
    Route::post('store/student', [CourseController::class, 'storeStudent'])->name('storeStudent');
    Route::get('/delete/student/{id}', [CourseController::class, 'deleteStudent'])->name('deleteStudent');

      // charts
      Route::get('/charts', [AdminController::class, 'charts'])->name('charts');
    //   Route::get('/add/Admin', [AdminController::class, 'addAdmin'])->name('addAdmin');
    //   Route::post('store/Admin', [AdminController::class, 'storeAdmin'])->name('storeAdmin');
    //   Route::get('/delete/Admin/{id}', [AdminController::class, 'deleteAdmin'])->name('deleteAdmin');
});
