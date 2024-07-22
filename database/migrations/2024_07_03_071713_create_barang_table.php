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
        Schema::create('barang', function (Blueprint $table) {
            $table->uuid('id_barang');
            $table->string('nm_barang');
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 8, 2);
            $table->foreignUuid('id_gudang')->nullable()->constrained('gudang', 'id_gudang')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
            $table->primary('id_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
