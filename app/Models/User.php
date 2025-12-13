<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Field yang boleh diisi (fillable)
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'role',

        // Tutor only (nullable)
        'phone_number',
        'pas_foto',
        'teaching_subject',
        'class_type',
    ];

    /**
     * Field yang disembunyikan saat serialize
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting otomatis, termasuk hashing password Laravel 10+
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function ratingsReceived()
    {
        return $this->hasMany(Rating::class, 'tutor_id');
    }

    // Ratings student beri
    public function ratingsGiven()
    {
        return $this->hasMany(Rating::class, 'student_id');
    }

    // Lesson sebagai student
    public function lessonsAsStudent()
    {
        return $this->hasMany(Lesson::class, 'student_id');
    }

    // Lesson sebagai tutor
    public function lessonsAsTutor()
    {
        return $this->hasMany(Lesson::class, 'tutor_id');
    }

    // Request yang dibuat student
    public function tutorRequests()
    {
        return $this->hasMany(TutorRequest::class, 'student_id');
    }

    // Request diterima tutor
    public function tutorRequestsReceived()
    {
        return $this->hasMany(TutorRequest::class, 'tutor_id');
    }

    // Transaksi student
    public function transactionsAsStudent()
    {
        return $this->hasMany(Transaction::class, 'student_id');
    }

    // Transaksi tutor
    public function transactionsAsTutor()
    {
        return $this->hasMany(Transaction::class, 'tutor_id');
    }

    public function studentPayments()
{
    return $this->hasMany(StudentPayment::class, 'student_id');
}

public function tutorPayments()
{
    return $this->hasMany(StudentPayment::class, 'tutor_id');
}

public function tutorPayouts()
{
    return $this->hasMany(TutorPayout::class, 'tutor_id');
}

}
