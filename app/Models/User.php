<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the surveys for the user.
     */
    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }

    /**
     * Get the attempts for the user.
     */
    public function attempts()
    {
        return $this->hasMany(Attempt::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function updateProfilePhoto($file)
    {
        // delete old avatar
        if ($this->avatar) {
            Storage::disk('public')->delete($this->avatar);
        }
        $this->avatar = $file->storePublicly('avatars', ['disk' => 'public']);

        $this->save();

        return $this->avatar;
    }


}
