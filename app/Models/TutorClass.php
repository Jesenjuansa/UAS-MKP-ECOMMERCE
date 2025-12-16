<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorClass extends Model
{
    protected $fillable = [
        'tutor_id',
        'title',
        'description',
        'price',
        'duration',
        'day',
        'photo',
    ];

    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }

    public function ratings()
{
    return $this->hasMany(Rating::class, 'class_id');
}


}
