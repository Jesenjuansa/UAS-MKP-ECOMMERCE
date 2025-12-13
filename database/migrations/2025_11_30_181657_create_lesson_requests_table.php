<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
{
    Schema::create('lesson_requests', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('student_id');
        $table->unsignedBigInteger('tutor_id');
        $table->string('student_name');
        $table->string('subject');
        $table->string('schedule');
        $table->string('duration');
        $table->integer('price');
        $table->string('learning_mode')->default('online'); // online/offline
        $table->string('meeting_link')->nullable();
        $table->enum('status', ['DEAL','ONGOING','DONE','REJECTED'])->default('DEAL');
        $table->timestamps();

        $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('tutor_id')->references('id')->on('users')->onDelete('cascade');
    });
}



    public function down(): void
    {
        Schema::dropIfExists('lesson_requests');
    }
};
