<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{HomeController,BarangController,GudangController,PenyimpananController};
use App\Models\Gudang;

Route::get('/', [HomeController::class, 'index'])->middleware(['auth','verified']);

Route::get('/barang', [BarangController::class, 'index'])->middleware('auth');

Route::get('/gudang', [GudangController::class, 'index'])->middleware('auth');

Route::get('/save/barang/', function ()  {
    return view ('barang.Simpan', ['gudang' => Gudang::all()])->middleware('auth');
});

Route::get('/save/barang/{id}', [BarangController::class, 'tampilUbah'])->middleware('auth');

Route::post('/insert/barang', [BarangController::class, 'simpan']);

Route::put('/update/barang/{id}', [BarangController::class, 'ubah']);

Route::delete('/delete/barang/{id}', [BarangController::class, 'hapus'])->middleware('auth');

Route::get('/save/gudang/', function ()  {
    return view ('gudang.Simpan')->middleware('auth');
});

Route::get('/save/gudang/{id}', [GudangController::class, 'tampilUbah'])->middleware('auth');

Route::post('/insert/gudang', [GudangController::class, 'simpan']);

Route::put('/update/gudang/{id}', [GudangController::class, 'ubah']);

Route::delete('/delete/gudang/{id}', [GudangController::class, 'hapus'])->middleware('auth');

Route::get('/softDelInfo/barang', [BarangController::class, 'dataSoftDel'])->middleware('auth');

Route::get('/softDelInfo/gudang', [GudangController::class, 'dataSoftDel'])->middleware('auth');

Route::get('/restore/barang/{id?}', [BarangController::class, 'balikanData'])->middleware('auth');

Route::get('/restore/gudang/{id?}', [GudangController::class, 'balikanData'])->middleware('auth');

Route::match(['get', 'delete'], '/delPermanent/barang/{id?}', [BarangController::class, 'hapusPermanen'])->middleware('auth');

Route::match(['get', 'delete'], '/delPermanent/gudang/{id?}', [GudangController::class, 'hapusPermanen'])->middleware('auth');

Route::get('/save/penyimpanan/{id}', [PenyimpananController::class, 'index'])->middleware('auth');

Route::post('/insert/penyimpanan/{id}', [PenyimpananController::class, 'simpan']);