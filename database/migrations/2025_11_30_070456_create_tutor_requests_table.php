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
        Schema::create('tutor_requests', function (Blueprint $table) {
            $table->id();

            /* =====================
               RELASI UTAMA
            ===================== */
            $table->foreignId('student_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            $table->foreignId('tutor_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            // 🔥 RELASI KE KELAS (WAJIB UNTUK RATING)
            $table->foreignId('class_id')
                  ->constrained('tutor_classes')
                  ->cascadeOnDelete();

            /* =====================
               DATA YANG DITAMPILKAN
            ===================== */
            $table->string('student_name');
            $table->string('subject');
            $table->string('schedule');
            $table->string('duration');
            $table->integer('price');

            /* =====================
               STATUS FLOW
            ===================== */
            $table->enum('status', [
                'DEAL',              // student request → tutor belum verifikasi
                'WAITING_PAYMENT',   // tutor accept → student bayar
                'ONGOING',           // payment dikirim
                'DONE',              // lesson selesai
                'REJECTED'           // tutor reject
            ])->default('DEAL');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_requests');
    }
};
