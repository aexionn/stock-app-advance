<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Gudang;

class HomeController extends Controller
{
    public function index() : View {
        $gudang = Gudang::with('barang')->get();
        return view('HomeView', ['title' => 'Beranda', 'Detail' => $gudang]);
    }
}
