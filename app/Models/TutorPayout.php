<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorPayout extends Model
{
    use HasFactory;

    protected $fillable = [
        'tutor_id',
        'amount',
        'bank_name',
        'bank_account',
        'account_holder',
        'admin_proof',
        'status',
    ];

    // Tutor penerima uang
    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }
}
