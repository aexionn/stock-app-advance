<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\{SimpanBarangRequest, UbahBarangRequest};
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\{Barang, Gudang};

class BarangController extends Controller
{
    public function index() : View {
        $barang = Barang::all();
        return view('Barang', ['title' => 'Data Barang', 'Barang' => $barang]);
    }

    public function tampilUbah($id) : View | array {
        $barang = Barang::where('id_barang', $id)->get();
        if (blank($barang)) {
            return redirect('/barang');
        }
        return view('barang.Ubah', ['title' => 'Ubah Data Barang', 'id' => $id, 'Barang' => $barang, 'gudang' => Gudang::all()]);
    }

    public function dataSoftDel() : View | array {
        $softDel = Barang::onlyTrashed()->get();
        return view('barang.SoftDelete ', ['title' => 'Tempat Daur Ulang', 'soft' => $softDel]);
    }

    public function simpan(SimpanBarangRequest $request) : RedirectResponse {
        $barang = Barang::create($request->validated());    
        return redirect('/barang')->withErrors($barang, 'simpanBar')->withInput();
    }
       
    public function ubah(UbahBarangRequest $request, $id) : RedirectResponse {
        $barang = Barang::find($id);
        $barang->update($request->validated());
        return redirect('/barang')->withErrors($barang, 'ubahBar');
    }

    public function hapus($id) : RedirectResponse {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/barang');
    }

    public function balikanData($id = null) : RedirectResponse | array {
        if ($id != null) {
            $softDel = Barang::onlyTrashed()->where('id_barang', $id)->restore();
            return redirect('/softDelInfo/barang');
        }else {
            $softDel = Barang::onlyTrashed()->restore();
            return redirect('/barang');
        }   
    }

    public function hapusPermanen($id = null) : RedirectResponse
    {
        if ($id != null) {
            $barang = Barang::onlyTrashed()->where('id_barang', $id)->forceDelete();
            return redirect('/softDelInfo/barang');
        }else {
            $barang = Barang::onlyTrashed()->forceDelete();
            return redirect('/softDelInfo/barang');
        }
    }
}
