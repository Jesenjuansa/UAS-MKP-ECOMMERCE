<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tutor_classes', function (Blueprint $table) {
            $table->id();

            // Relasi ke user (tutor)
            $table->unsignedBigInteger('tutor_id');

            // Data kelas
            $table->string('title');          // judul kelas
            $table->integer('price');         // harga kelas
            $table->string('duration');       // durasi (misal: "45 minutes")
            $table->text('description');      // deskripsi kelas
            $table->string('day');            // hari, contoh: "Monday, Friday"
            $table->string('photo')->nullable();

            $table->timestamps();

            // Foreign key
            $table->foreign('tutor_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tutor_classes');
    }
};
