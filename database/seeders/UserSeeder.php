<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@app.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Guru
        $guru = User::create([
            'name' => 'Guru Matematika',
            'email' => 'guru@app.com',
            'password' => Hash::make('password'),
            'role' => 'guru',
        ]);

        Teacher::create([
            'user_id' => $guru->id,
            'alamat' => 'Jl. Guru Nomor 1',
            'no_telepon' => '08123456789',
            'mapel' => 'Matematika',
        ]);

        // Murid
        $murid = User::create([
            'name' => 'Murid A',
            'email' => 'murid@app.com',
            'password' => Hash::make('password'),
            'role' => 'murid',
        ]);

        Student::create([
            'user_id' => $murid->id,
            'alamat' => 'Jl. Siswa 123',
            'no_telepon' => '08234567890',
            'kelas' => 'X IPA 1',
            'status' => 'aktif',
        ]);
    }
}
