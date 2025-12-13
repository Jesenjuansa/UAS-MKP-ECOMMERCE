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
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('tutor_id')->constrained('users')->onDelete('cascade');
        $table->decimal('amount', 10, 2);
        $table->enum('status', ['pending','paid','refunded','failed'])->default('pending');
        $table->string('payment_method')->nullable();
        $table->string('external_id')->nullable(); // id dari payment gateway
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('transactions');
}

};
