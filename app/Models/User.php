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
        'rate_per_session',
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
}
