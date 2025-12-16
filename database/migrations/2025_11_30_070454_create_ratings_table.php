<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();

            // student yang memberi rating
            $table->foreignId('student_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            // tutor yang di-rating
            $table->foreignId('tutor_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            // kelas yang diikuti (PENTING)
            $table->foreignId('class_id')
                  ->constrained('tutor_classes') // ✅ FIX DI SINI
                  ->cascadeOnDelete();

            // nilai rating (1–5)
            $table->unsignedTinyInteger('rating');

            // review (opsional)
            $table->text('review')->nullable();

            $table->timestamps();

            // cegah rating ganda
            $table->unique(['student_id', 'class_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
