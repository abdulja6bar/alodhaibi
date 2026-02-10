<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

class museres extends Authenticatable
{
    use HasFactory,Notifiable;
       protected $table="users";
     protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
