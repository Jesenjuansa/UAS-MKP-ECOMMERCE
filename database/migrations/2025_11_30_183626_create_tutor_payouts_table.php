<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tutor_payouts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tutor_id')->constrained('users')->onDelete('cascade');

            // uang yang harus dibayar admin ke tutor
            $table->integer('amount');

            // bank info dari tutor profile
            $table->string('bank_name')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('account_holder')->nullable();

            // bukti pembayaran dari admin
            $table->string('admin_proof')->nullable();

            $table->enum('status', ['pending', 'paid'])
                  ->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tutor_payouts');
    }
};
