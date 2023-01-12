<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\TiketMasukController;
use App\Http\Controllers\TiketKeluarController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/pegawai', [RegisteredUserController::class, 'indexView'])->name('pegawai.index');
    Route::get('/pegawai-create', [RegisteredUserController::class, 'createView'])->name('pegawai.create');
    Route::post('/pegawai-store', [RegisteredUserController::class, 'pegawaiStore'])->name('pegawai.store');
    Route::get('/pegawai-preview/{id}', [RegisteredUserController::class, 'pegawaiPreview'])->name('pegawai.preview');
    Route::put('/pegawai-update/{id}', [RegisteredUserController::class, 'pegawaiUpdate'])->name('pegawai.update');

    Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan.index');
    Route::get('/kendaraan-create', [KendaraanController::class, 'createView'])->name('kendaraan.create');
    Route::post('/kendaraan-store', [KendaraanController::class, 'kendaraanStore'])->name('kendaraan.store');
    Route::get('/kendaraan-preview/{id}', [KendaraanController::class, 'kendaraanPreview'])->name('kendaraan.preview');
    Route::put('/kendaraan-update/{id}', [KendaraanController::class, 'kendaraanUpdate'])->name('kendaraan.update');

    Route::get('/tiket-masuk', [TiketMasukController::class, 'index'])->name('tiket-masuk.index');
    Route::get('/tiket-masuk/generate', [TiketMasukController::class, 'generateTiket'])->name('tiket-masuk.generate');
    Route::get('/tiket-masuk/cetak/{tiket}', [TiketMasukController::class, 'cetakTiket'])->name('tiket-masuk.cetak');
    
    Route::get('/tiket-keluar', [TiketKeluarController::class, 'index'])->name('tiket-keluar.index');
    Route::post('/tiket-keluar/cari', [TiketKeluarController::class, 'cari'])->name('tiket-keluar.cari');
    Route::get('/tiket-keluar/get/{id}', [TiketKeluarController::class, 'preview'])->name('tiket-keluar.preview');
    Route::post('/tiket-keluar', [TiketKeluarController::class, 'store'])->name('tiket-keluar.store');


});

require __DIR__.'/auth.php';
