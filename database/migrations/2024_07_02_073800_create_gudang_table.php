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
        Schema::create('gudang', function (Blueprint $table) {
            $table->uuid('id_gudang');
            $table->string('nm_tempat');
            $table->string('lokasi');
            $table->string('nm_supervisor');
            $table->integer('kapasitas');
            $table->timestamps();
            $table->softDeletes();
            $table->primary('id_gudang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gudang');
    }
};
