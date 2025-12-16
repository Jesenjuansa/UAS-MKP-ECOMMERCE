<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'student_id',
        'tutor_id',
        'class_id',
        'rating',
        'review',
    ];

    public function student()
    {
        return $this->belongsTo(User::class);
    }

    public function tutor()
    {
        return $this->belongsTo(User::class);
    }
}
