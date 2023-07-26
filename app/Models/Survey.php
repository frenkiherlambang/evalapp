<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function userAttempts()
    {
        return $this->hasMany(Attempt::class)->where('user_id', auth()->id());
    }

    public function questions()
    {
        return $this->hasManyThrough(Question::class, Category::class);
    }
}
