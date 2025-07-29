<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_regulasis_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('regulasis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->date('tanggal');
            $table->text('isi_keputusan');
            $table->string('thumbnail')->nullable(); // Gambar kecil untuk preview
            $table->string('file_path')->nullable(); // Path untuk file PDF/dokumen
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('regulasis');
    }
};
