<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'user_email',
        'rating',
        'comment',
        'service_type',
        'is_approved'
    ];

    protected $casts = [
        'rating' => 'float',
        'is_approved' => 'boolean'
    ];
}