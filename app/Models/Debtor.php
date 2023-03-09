<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Debtor extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];
    

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
