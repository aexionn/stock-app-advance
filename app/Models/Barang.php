<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Barang extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $fillable = ['nm_barang', 'stok_awal', 'stok_terbaru', 'deskripsi', 'harga'];
    const CREATED_AT = 'ditambahkan_pada';
    const UPDATED_AT = 'diubah_pada';

    const MILLIGRAM = 'mg';
    const GRAM = 'g';
    const KILOGRAM = 'kg';
    const UNIT = 'pcs';
    const BOX = 'box';

    public static function availableUnits(): array
    {
        return [
            self::MILLIGRAM,
            self::GRAM,
            self::KILOGRAM,
            self::UNIT,
            self::BOX,
        ];
    }

    /**
     * The gudang that belong to the barang.
     */
    public function gudang(): BelongsToMany
    {
        return $this->belongsToMany(Gudang::class, 'penyimpanan', 'id_barang', 'id_gudang')->withPivot('kode', 'jumlah_barang',  'ditambahkan_pada', 'diubah_pada')->as('penyimpanan')->using(Penyimpanan::class);
    }
}
