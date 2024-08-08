<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{HomeController,BarangController,GudangController,PenyimpananController};
use App\Models\Gudang;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    
    Route::get('/barang', [BarangController::class, 'index']);
    
    Route::get('/gudang', [GudangController::class, 'index']);
    
    Route::get('/save/barang/', function ()  {
        return view ('barang.Simpan', ['gudang' => Gudang::all()]);
    });
    
    Route::get('/save/barang/{id}', [BarangController::class, 'tampilUbah']);
    
    Route::post('/insert/barang', [BarangController::class, 'simpan']);
    
    Route::put('/update/barang/{id}', [BarangController::class, 'ubah']);
    
    Route::delete('/delete/barang/{id}', [BarangController::class, 'hapus']);
    
    Route::get('/save/gudang/', function ()  {
        return view ('gudang.Simpan');
    });
    
    Route::get('/save/gudang/{id}', [GudangController::class, 'tampilUbah']);
    
    Route::post('/insert/gudang', [GudangController::class, 'simpan']);
    
    Route::put('/update/gudang/{id}', [GudangController::class, 'ubah']);
    
    Route::delete('/delete/gudang/{id}', [GudangController::class, 'hapus']);
    
    Route::get('/softDelInfo/barang', [BarangController::class, 'dataSoftDel']);
    
    Route::get('/softDelInfo/gudang', [GudangController::class, 'dataSoftDel']);
    
    Route::get('/restore/barang/{id?}', [BarangController::class, 'balikanData']);
    
    Route::get('/restore/gudang/{id?}', [GudangController::class, 'balikanData']);
    
    Route::match(['get', 'delete'], '/delPermanent/barang/{id?}', [BarangController::class, 'hapusPermanen']);
    
    Route::match(['get', 'delete'], '/delPermanent/gudang/{id?}', [GudangController::class, 'hapusPermanen']);
    
    Route::get('/save/penyimpanan/{id}', [PenyimpananController::class, 'index']);
    
    Route::post('/insert/penyimpanan/{id}', [PenyimpananController::class, 'simpan']);
});