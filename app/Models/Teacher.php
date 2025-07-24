<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'alamat',
        'no_telepon',
        'mapel',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function material() {
        return $this->hasMany(Material::class);
    }
}
