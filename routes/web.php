<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\FormController;
use App\Http\Livewire\Lokasi;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/daftar', [DaftarController::class, 'index'])->middleware(['auth'])->name('daftar.daftar');
Route::get('/daftar/{perusahaan_id}', [DaftarController::class, 'show'])->middleware(['auth'])->name('daftar.show');
Route::get('/daftar/{perusahaan_id}/cetak', [DaftarController::class, 'cetakdetail'])->middleware(['auth'])->name('daftar.cetak');
Route::get('/daftar/plant/{plant_id}', [DaftarController::class, 'showplant'])->middleware(['auth'])->name('daftar.show.plant');
Route::get('/daftar/{perusahaan_id}/edit', [DaftarController::class, 'edit'])->middleware(['auth'])->name('daftar.edit');
Route::get('/daftar/cari', [Cariperusahaan::class, 'docariperusahaan'])->middleware(['auth'])->name('daftar.cari');
Route::get('/form', [FormController::class, 'viewformdaftar'])->middleware(['auth'])->name('form.daftar');
Route::get('/form/kabupaten/{propinsi_id}', [Lokasi::class, 'loadKabupaten'])->middleware(['auth'])->name('form.kabupaten');
Route::get('/form/kecamatan/{kabupaten_id}', [Lokasi::class, 'loadKecamatan'])->middleware(['auth'])->name('form.kecamatan');
Route::get('/form/kelurahan/{kecamatan_id}', [Lokasi::class, 'loadKelurahan'])->middleware(['auth'])->name('form.kelurahan');



Route::post('/form/storeformdaftar', [FormController::class, 'storeformdaftar'])->middleware(['auth'])->name('form.store');
Route::post('/daftar/insertregnumber', [DaftarController::class, 'insertregnumber'])->middleware(['auth'])->name('daftar.insertregnumber');
Route::post('/daftar/{perusahaan_id}/update', [DaftarController::class, 'update'])->middleware(['auth'])->name('daftar.update');
Route::post('/daftar/{perusahaan_id}/delete', [DaftarController::class, 'destroy'])->middleware(['auth'])->name('daftar.destroy');

require __DIR__.'/auth.php';
