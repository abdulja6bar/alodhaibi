<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;
     protected $fillable = [
        'ip_address',
        'device_id',
        'data',
        "device_token"
    ];
}
