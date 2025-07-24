<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourseLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'material_id',
        'status',
        'completed_at',
    ];

    public function student() {
        return $this->belongsTo(Student::class);
    }

      public function material() {
        return $this->belongsTo(Material::class);
    }
}
