<?php

use App\Http\Controllers\Admin\TearcherController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Guru\MaterialController;
use App\Http\Controllers\MUrid\DiscussionController;
use App\Models\StudentCourseLog;
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

// routes/web.php
Route::get('/admin', function () {
    return view('admin.index');
})->name('users.dashboard');
Route::get('/teacher', function () {
    return view('guru.index');
})->name('teacher.dashboard');
Route::get('/student', function () {
    return view('murid.index');
})->name('student.dashboard');

Route::resource('/admin/users', UserController::class);
Route::resource('/admin/teacher', TearcherController::class);
Route::resource('/guru/materials', MaterialController::class);
Route::resource('/murid/discussion', DiscussionController::class);
Route::post('/murid/logs', [StudentCourseLog::class, 'store'])->name('logs.store');