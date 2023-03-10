<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndexPdf extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'file',
        'status',
        'registerUser_id',
        'url'
    ];
    



}
