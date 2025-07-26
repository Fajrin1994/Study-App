<?php

use App\Models\StudentCourseLog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Guru\MaterialController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TearcherController;
use App\Http\Controllers\MUrid\DiscussionController;
use App\Http\Controllers\Admin\MaterialController as AdminMaterialController;
use App\Http\Controllers\MUrid\MaterialController as MuridMaterialController;

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
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Route admin role
    Route::get('/admin/dashboard', fn() => view('admin.index'))->name('admin.dashboard');
    Route::resource('/admin/users', UserController::class);
    Route::resource('/admin/teacher', TearcherController::class);
    Route::resource('/admin/student', StudentController::class);
    Route::resource('/admin/category', CategoryController::class);
    Route::get('/admin/approval', [AdminMaterialController::class, 'index'])->name('adminmaterial.index');
    Route::get('/admin/materials/{id}', [AdminMaterialController::class, 'show'])->name('adminmaterial.show');
    Route::post('/admin/materials/{id}/approve', [AdminMaterialController::class, 'approve'])->name('adminmaterial.approve');
    Route::post('/admin/materials/{id}/reject', [AdminMaterialController::class, 'reject'])->name('adminmaterial.reject');
});

Route::middleware(['auth', 'role:guru'])->group(function () {
    // Route guru role
    Route::get('/guru/dashboard', fn() => view('guru.index'))->name('guru.dashboard');
    Route::resource('/guru/materials', MaterialController::class);
    Route::get('/guru/materials/{id}/preview', [MaterialController::class, 'show'])->name('gurumaterial.show');
    
});

Route::middleware(['auth', 'role:murid'])->group(function () {
    // Route murid role
    Route::get('/murid/dashboard', fn() => view('murid.index'))->name('murid.dashboard');
    Route::get('/murid/materials', [MuridMaterialController::class, 'index'])->name('muridmaterials.index');
    Route::post('/murid/materials/{id}', [MuridMaterialController::class, 'index'])->name('muridmaterials.show');
    Route::get('/murid/my-materials', [MuridMaterialController::class, 'myMaterials'])->name('muridmaterials.mine');
    Route::resource('/murid/discussion', DiscussionController::class);
    Route::post('/murid/logs', [StudentCourseLog::class, 'store'])->name('logs.store');
});