<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'is_login',
        'is_active',
        'role_id'
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

    public function buyer(): HasMany
    {
        return $this->hasMany(Sales::class, 'user_id', 'id');
    }

    public function isAdmin(): bool
    {
        if ($this->role_id == 1) {
            return true;
        }
        return false;
    }
    public function isEditor(): bool
    {
        if ($this->role_id == 2) {
            return true;
        }
        return false;
    }
    public function isMember(): bool
    {
        if ($this->role_id == 3) {
            return true;
        }
        return false;
    }
}
