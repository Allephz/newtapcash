


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TapcashController;
use App\Http\Controllers\DashboardController;
Route::get('/main-dashboard', [DashboardController::class, 'index']);

Route::get('/', [TapcashController::class, 'dashboard']);
Route::get('/dashboard', [TapcashController::class, 'dashboard']);
Route::get('/master-tipe', [TapcashController::class, 'masterTipe']);
Route::post('/master-tipe', [TapcashController::class, 'storeTipe']);
Route::delete('/master-tipe/{id}', [TapcashController::class, 'destroyTipe']);
Route::get('/tambah-tapcash', [TapcashController::class, 'tambahTapcash']);
Route::post('/tambah-tapcash', [TapcashController::class, 'storeTapcash']);
Route::get('/dashboard/{id}/edit', [TapcashController::class, 'editTapcash']);
Route::put('/dashboard/{id}', [TapcashController::class, 'updateTapcash']);

use App\Http\Controllers\AuthController;
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::delete('/dashboard/{id}', [TapcashController::class, 'destroyTapcash']);

// Route untuk download CSV
Route::get('/download-excel', [TapcashController::class, 'downloadExcel']);
