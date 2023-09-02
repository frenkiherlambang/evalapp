<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::saving(function (Question $question) {
            if($question->survey_id == null)
            {
                $category = Category::find($question->category_id);
                $question->survey_id = $category->survey_id;
                $question->saveQuietly();
            }
        });
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

    // public function survey()
    // {
    //     return $this->belongsTo(Survey::class);
    // }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function randomChoices()
    {
        return $this->hasMany(Choice::class)->inRandomOrder();
    }
}
