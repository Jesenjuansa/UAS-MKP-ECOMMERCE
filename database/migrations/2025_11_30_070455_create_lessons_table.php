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
    Schema::create('lessons', function (Blueprint $table) {
        $table->id();
        $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('tutor_id')->constrained('users')->onDelete('cascade');
        $table->string('subject')->nullable();
        $table->timestamp('scheduled_at')->nullable();
        $table->enum('status', ['pending','accepted','rejected','completed','cancelled'])->default('pending');
        $table->string('meeting_link')->nullable();
        $table->text('notes')->nullable();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('lessons');
}

};
