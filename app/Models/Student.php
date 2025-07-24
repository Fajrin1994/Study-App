<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'alamat',
        'no_telepon',
        'kelas',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function studentcourselog() {
        return $this->hasMany(StudentCourseLog::class);
    }
}
