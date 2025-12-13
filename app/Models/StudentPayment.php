<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'tutor_id',
        'lesson_request_id',
        'amount',
        'proof',
        'status',
    ];

    // Student yang melakukan pembayaran
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    // Tutor tujuan pembayaran
    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }

    // Optional — terkait request les
    public function lessonRequest()
    {
        return $this->belongsTo(LessonRequest::class);
    }
}
