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
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul hero section
            $table->text('description')->nullable(); // Deskripsi hero
            $table->string('button_text')->nullable(); // Teks tombol CTA
            $table->string('button_link')->nullable(); // Link tombol CTA
            $table->string('contact_text')->nullable(); // Teks kontak utama
            $table->string('contact_subtext')->nullable(); // Subteks kontak
            $table->string('image_main')->nullable(); // Gambar utama hero
            $table->json('shape_images')->nullable(); // Kumpulan gambar shape (JSON)
            $table->boolean('is_active')->default(true); // Menandai hero aktif/tidak
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
