<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Barang;

class HomeController extends Controller
{
    public function index() : View {
        $barang = Barang::with('gudang')->get();
        // dd(Barang::with('gudang')->toSql());
        return view('HomeView', ['title' => 'Beranda', 'Detail' => $barang]);
    }
}
