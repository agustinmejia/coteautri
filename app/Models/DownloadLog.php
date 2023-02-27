<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user',
        'email',
        'role',
        'ip_address',
        'user_agent',
        'url',
        'downloadType',
        'type'
    ];
}
