<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Yadahan\AuthenticationLog\AuthenticationLogable;

class User extends \TCG\Voyager\Models\User
{
    // use HasApiTokens, HasFactory, Notifiable;

    // use HasFactory, Notifiable, AuthenticationLogable;
    use Notifiable, AuthenticationLogable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'google_id',
        'facebook_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function people(){
        return $this->hasMany(People::class, 'user_id');
    }

    public function scopeEnable($query){
        return $query->where('role_id', 2);
        // return $query->whereRaw("id not in (select user_id from people where status = 1 and deleted_at is null)");
    }
}
