<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $fillable = [
        'ci',
        'first_name',
        'last_name',
        'email',
        'birth_date',
        'phone',
        'type',
        'status',
        'observation',
        'deleted_at',
        'user_id',
        'code'
    ];
}
