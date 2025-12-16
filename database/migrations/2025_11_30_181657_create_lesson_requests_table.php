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
    $table->unsignedBigInteger('tutor_class_id');

    $table->string('schedule');
    $table->integer('duration'); // minutes
    $table->integer('price');

    $table->enum('learning_mode', ['online','offline'])->default('online');
    $table->string('meeting_link')->nullable();

    $table->enum('status', [
        'waiting_verification',
        'waiting_payment',
        'ongoing',
        'done',
        'rejected'
    ])->default('waiting_verification');

    $table->timestamps();

    $table->foreign('student_id')->references('id')->on('users')->cascadeOnDelete();
    $table->foreign('tutor_id')->references('id')->on('users')->cascadeOnDelete();
    $table->foreign('tutor_class_id')->references('id')->on('tutor_classes')->cascadeOnDelete();
});

}



    public function down(): void
    {
        Schema::dropIfExists('lesson_requests');
    }
};
