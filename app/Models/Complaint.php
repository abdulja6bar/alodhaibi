<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;
       protected $table="complaints";

  protected $fillable = [
    'user_name',
    'user_email',
    'description',
    'status',
    'phone',
    'admin_reply'
];

    
 public function files()
{
    return $this->hasMany(ComplaintFile::class, 'complaint_id');
}

}