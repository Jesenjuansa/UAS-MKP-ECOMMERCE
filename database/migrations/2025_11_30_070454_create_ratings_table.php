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
    Schema::create('ratings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('tutor_id')->constrained('users')->onDelete('cascade');
        $table->tinyInteger('rating')->unsigned(); // 1..5
        $table->text('review')->nullable();
        $table->timestamps();

        $table->unique(['student_id','tutor_id','created_at'], 'rating_unique_per_session');
        // optional: prevents duplicate same-timestamp entries; adjust as needed
    });
}

public function down(): void
{
    Schema::dropIfExists('ratings');
}

};
