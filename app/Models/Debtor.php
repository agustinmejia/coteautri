<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debtor extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'service_id',
        'details',
        'amount',
        'month',
        'year',
        'status',
        'registerUser_id',
        'deleted_at',
        'deletedUser_id'
    ];


}
