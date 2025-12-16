<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\StudentPayment;

class TutorRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'tutor_id',
         'class_id',
        'student_name',
        'subject',
        'schedule',
        'duration',
        'price',
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

    // tambahan (aman)
    public function payment()
    {
        return $this->hasOne(StudentPayment::class, 'lesson_request_id');
    }

    // optional helper
    public function isDone()
    {
        return $this->status === 'DONE';
    }
}

