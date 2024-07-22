<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $fillable = ['nm_barang', 'deskripsi', 'harga', 'id_gudang'];

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
     * Get the gudang that owns the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gudang(): BelongsTo
    {
        return $this->belongsTo(Gudang::class, 'id_gudang');
    }
}
