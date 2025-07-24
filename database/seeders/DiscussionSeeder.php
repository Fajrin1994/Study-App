<?php

namespace Database\Seeders;

use App\Models\Discussion;
use App\Models\Material;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscussionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = User::where('role', 'murid')->first();
        $material = Material::first();

        Discussion::create([
            'material_id' => $material->id,
            'user_id' => $user->id,
            'message' => 'Penjelasannya sangat mudah dimengerti, terima kasih!',
        ]);
    }
}
