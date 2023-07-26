<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $casts = [
        'feedbacks' => 'array',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function randomQuestions()
    {
        return $this->hasMany(Question::class)->inRandomOrder();
    }

    public function answers()
    {
        return $this->hasManyThrough(Answer::class, Question::class);
    }

    public function userAnswers($surveyId)
    {
        return $this->hasManyThrough(Answer::class, Question::class)->where('user_id', auth()->id())->where('answers.survey_id', $surveyId);
    }

    public function categoryFeedbacks()
    {
        return $this->hasMany(CategoryFeedback::class);
    }
}
