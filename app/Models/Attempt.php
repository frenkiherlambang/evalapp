<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attempt extends Model
{
    use HasFactory;

    protected $casts = [
        'survey_data' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function attemptQuestions()
    {
        return $this->hasMany(AttemptQuestion::class);
    }
}
