<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\TutorRequest;

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

    // student yang bayar
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    // tutor tujuan pembayaran
    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }

    // 🔥 INI YANG HILANG
    public function lessonRequest()
    {
        return $this->belongsTo(TutorRequest::class, 'lesson_request_id');
    }
}
