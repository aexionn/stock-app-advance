<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class Penyimpanan extends Pivot
{
    use HasUuids;

    protected $table = 'penyimpanan';
    protected $primaryKey = 'id_penyimpanan';
    protected $fillable = ['kode', 'id_barang', 'id_gudang', 'jumlah_barang'];
    // const CREATED_AT = 'ditambahkan_pada';
    // const UPDATED_AT = 'diubah_pada';
}
