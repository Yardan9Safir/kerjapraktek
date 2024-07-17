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
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_santri')->references('id')->on('santris')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId("id_kelas")->references("id")->on("kelas")->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId("id_mata_pelajaran")->references("id")->on("mapels")->onDelete('cascade')->onUpdate('cascade');
            $table->enum("semester", ["1", "2"]);
            $table->smallInteger("nilai");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
