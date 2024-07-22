<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Gudang;
use App\Http\Requests\{SimpanGudangRequest,UbahGudangRequest};

class GudangController extends Controller
{
    public function index() : View {
        return view('Gudang', ['title' => 'Data Gudang', 'Gudang' => Gudang::all()]);
    }

    public function tampilUbah($id) : View | Array | RedirectResponse {
        $gudang = Gudang::where('id_gudang', $id)->get();
        if (blank($gudang)) {
            return redirect('/gudang');
        }
        return view('gudang.Ubah', ['title' => 'Ubah Data Gudang', 'id'=>$id, 'Gudang' => $gudang]);    
    }

    public function dataSoftDel() : View | array {
        $softDel = Gudang::onlyTrashed()->get();
        return view('gudang.SoftDelete ', ['title' => 'Tempat Daur Ulang', 'soft' => $softDel]);
    }

    public function simpan(SimpanGudangRequest $request) : RedirectResponse
    {
        $validator = $request->validated();
        $gudang = Gudang::create($validator);
        return redirect('/gudang')->withErrors($validator);
    }

    public function ubah(UbahGudangRequest $request, $id) : RedirectResponse{
        $gudang = Gudang::find($id);
        $validator = $request->validated();
        $gudang->update($validator);
        return redirect('/gudang')->withErrors($validator);
    }

    public function hapus($id) : RedirectResponse {
        $gudang = Gudang::find($id);
        $gudang->delete();
        return redirect('/gudang');
    }

    public function balikanData($id = null) : RedirectResponse | array {
        if ($id != null) {
            $softDel = Gudang::onlyTrashed()->where('id_gudang', $id)->restore();
            return redirect('/softDelInfo/gudang');
        }else {
            $softDel = Gudang::onlyTrashed()->restore();
            return redirect('/gudang');
        }   
    }

    public function hapusPermanen($id = null) : RedirectResponse
    {
        if ($id != null) {
            $gudang = Gudang::onlyTrashed()->where('id_gudang', $id)->forceDelete();
            return redirect('/softDelInfo/gudang');
        }else {
            $gudang = Gudang::onlyTrashed()->forceDelete();
            return redirect('/softDelInfo/gudang');
        }
    }
}
