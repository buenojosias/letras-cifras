<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Josias Bueno',
            'email' => 'josias.jpb@gmail.com',
            'password' => bcrypt('123456'),
            'is_admin' => true,
        ]);
    }
}
