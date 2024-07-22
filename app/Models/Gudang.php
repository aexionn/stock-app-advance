<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Barang;

class Gudang extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'gudang';
    protected $primaryKey = 'id_gudang';
    protected $fillable = ['nm_tempat', 'lokasi', 'nm_supervisor', 'kapasitas'];

    /**
     * Get the gudang associated with the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function barang(): HasMany
    {
        return $this->hasMany(Barang::class, 'id_gudang');
    }
}
