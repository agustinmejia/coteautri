<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telephony extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'full_name',
        'status',
        'registerUser_id',
        'deletedUser_id',
        'deleted_at'
    ];
}
