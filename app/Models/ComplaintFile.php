<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintFile extends Model
{
    use HasFactory;
      protected $fillable = [
        'complaint_id',
        'file_name',
        'file_path',
    ];
     // علاقة مع الشكوى
    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }

}
