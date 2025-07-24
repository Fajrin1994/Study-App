<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'category_id',
        'title',
        'description',
        'type',
        'file_path',
        'approval_status',
    ];

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function discussions() {
        return $this->hasMany(Discussion::class);
    }

    public function studentcoruselog() {
        return $this->hasMany(StudentCourseLog::class);
    }
}
