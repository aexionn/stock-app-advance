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
        Schema::create('mutasi', function (Blueprint $table) {
            $table->uuid('id_mutasi');
            $table->foreignUuid('id_penyimpanan')->nullable()->constrained('penyimpanan', 'id_penyimpanan')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('stok_bertambah')->default(12);
            $table->integer('stok_berkurang')->default(12);
            $table->timestamp('ditambahkan_pada')->useCurrent();
            $table->timestamp('diubah_pada')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->primary('id_mutasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasi');
    }
};
