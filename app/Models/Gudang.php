<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
// use App\Models\Barang;

class Gudang extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'gudang';
    protected $primaryKey = 'id_gudang';
    protected $fillable = ['nm_tempat', 'lokasi', 'nm_supervisor', 'kapasitas'];
    const CREATED_AT = 'ditambahkan_pada';
    const UPDATED_AT = 'diubah_pada';

    /**
     * The barang that belong to the gudang.
     */
    public function barang(): BelongsToMany
    {
        return $this->belongsToMany(Barang::class, 'penyimpanan', 'id_barang', 'id_gudang')->withPivot('kode', 'jumlah_barang', 'ditambahkan_pada', 'diubah_pada')->as('penyimpanan')->using(Penyimpanan::class);
    }
}
