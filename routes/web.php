<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LaborController;
use App\Http\Controllers\SiswaController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::prefix('master-siswa')->group(function () {
    Route::get('/', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/simpan', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/hapus/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    // ✅ Tambahan untuk barcode
    Route::get('/barcode/{id}', [SiswaController::class, 'barcode'])->name('siswa.barcode');
    Route::get('/barcode-all', [SiswaController::class, 'barcodeAll'])->name('siswa.barcodeAll');
});
Route::prefix('master-guru')->group(function () {
    Route::get('/', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/create', [GuruController::class, 'create'])->name('guru.create');
    Route::post('/simpan', [GuruController::class, 'store'])->name('guru.store');
    Route::get('/edit/{id}', [GuruController::class, 'edit'])->name('guru.edit');
    Route::put('/update/{id}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/hapus/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');
});

Route::prefix('master-kelas')->group(function () {
    Route::get('/', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('/simpan', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/edit/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('/update/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/hapus/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');
});

Route::prefix('master-labor')->group(function () {
    Route::get('/', [LaborController::class, 'index'])->name('labor.index');
    Route::get('/create', [LaborController::class, 'create'])->name('labor.create');
    Route::post('/simpan', [LaborController::class, 'store'])->name('labor.store');
    Route::get('/edit/{id}', [LaborController::class, 'edit'])->name('labor.edit');
    Route::put('/update/{id}', [LaborController::class, 'update'])->name('labor.update');
    Route::delete('/hapus/{id}', [LaborController::class, 'destroy'])->name('labor.destroy');
});

Route::prefix('master-absen')->group(function () {
    Route::get('/', [AbsenController::class, 'index'])->name('absen.index');
    Route::post('/absen/scan', [AbsenController::class, 'scan'])->name('absen.scan');
    Route::get('/create', [AbsenController::class, 'create'])->name('absen.create');
    Route::post('/simpan', [AbsenController::class, 'store'])->name('absen.store');
    Route::get('/edit/{id}', [AbsenController::class, 'edit'])->name('absen.edit');
    Route::put('/update/{id}', [AbsenController::class, 'update'])->name('absen.update');
    Route::delete('/hapus/{id}', [AbsenController::class, 'destroy'])->name('absen.destroy');
    Route::get('/show/{id}', [AbsenController::class, 'show'])->name('absen.show');
});

