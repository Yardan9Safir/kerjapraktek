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
        Schema::create('filter_airs', function (Blueprint $table) {
            $table->id();
            $table->string("nama_alat");
            $table->string("deskripsi_alat");
            $table->integer("stok_alat");
            $table->float("harga_alat");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filterairs');
    }
};
