<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonRequest extends Model
{
    protected $fillable = [
        'student_id',
        'tutor_id',
        'student_name',
        'subject',
        'schedule',
        'duration',
        'price',
        'learning_mode',
        'meeting_link',
        'status',
    ];



    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }

    public function class()
    {
        return $this->belongsTo(TutorClass::class, 'class_id');
    }
}
