<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimpleAuthController;
use App\Http\Controllers\TapcashController;
use App\Http\Controllers\DashboardController;

// Route login manual
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Route login POST
Route::post('/login', [SimpleAuthController::class, 'login']);

Route::post('/logout', [SimpleAuthController::class, 'logout'])->name('logout');
Route::get('/main-dashboard', [DashboardController::class, 'index']);
Route::get('/', [TapcashController::class, 'dashboard']);
Route::get('/dashboard', [TapcashController::class, 'index']);
Route::get('/dashboard/tipe/{tipe}', [TapcashController::class, 'indexByTipe']);
Route::get('/master-tipe', [TapcashController::class, 'masterTipe']);
Route::post('/master-tipe', [TapcashController::class, 'storeTipe']);
Route::delete('/master-tipe/{id}', [TapcashController::class, 'destroyTipe']);
Route::get('/tambah-tapcash', [TapcashController::class, 'tambahTapcash']);
Route::post('/tambah-tapcash', [TapcashController::class, 'storeTapcash']);
Route::get('/dashboard/{id}/edit', [TapcashController::class, 'editTapcash']);
Route::put('/dashboard/{id}', [TapcashController::class, 'updateTapcash']);
Route::delete('/dashboard/{id}', [TapcashController::class, 'destroyTapcash']);
// Route untuk download CSV
Route::get('/download-excel', [TapcashController::class, 'downloadExcel']);
Route::get('/download-excel/tipe/{tipe}', [TapcashController::class, 'downloadExcelByTipe']);
