<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penyimpanan', function (Blueprint $table) {
            $table->uuid('id_penyimpanan');
            $table->string('kode');
            $table->foreignUuid('id_barang')->nullable()->constrained('barang', 'id_barang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('id_gudang')->nullable()->constrained('gudang', 'id_gudang')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jumlah_barang')->default(12);
            $table->timestamp('ditambahkan_pada')->useCurrent();
            $table->timestamp('diubah_pada')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->primary('id_penyimpanan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyimpanan');
    }
};
