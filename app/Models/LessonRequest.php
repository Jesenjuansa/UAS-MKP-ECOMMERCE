<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonRequest extends Model
{
    protected $fillable = [
        'student_id',
        'tutor_id',
        'tutor_class_id',
        'schedule',
        'duration',
        'price',
        'learning_mode',
        'meeting_link',
        'status',
    ];

    /* =====================
        RELATIONS
    ===================== */

    // Student (User)
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    // Tutor (User)
    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }

    // Tutor Class
    public function tutorClass()
    {
        return $this->belongsTo(TutorClass::class);
    }
}
