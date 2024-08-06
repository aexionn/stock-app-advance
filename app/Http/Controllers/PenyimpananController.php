<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\{SimpanPenyimpananRequest, UbahPenyimpananRequest};
use App\Models\{Barang, Gudang};

class PenyimpananController extends Controller
{
    public function index($id) : View
    {
        $gudang = Gudang::with('barang')->get();
        return view('penyimpanan.Simpan', ['gudang' => $gudang, 'id' => $id]);
    }

    public function simpan(SimpanPenyimpananRequest $request, $id) : RedirectResponse
    {
        // dd($barang); 
        $validate = $request->validated();
        $barang = Barang::find($id); 
        $barang->gudang()->attach($validate['id_gudang'], ['kode' => $validate['kode'], 'jumlah_barang' => $validate['jumlah_barang']]);
        return redirect('/')->withErrors($barang, 'simpanPeny')->withInput();
    }
}
