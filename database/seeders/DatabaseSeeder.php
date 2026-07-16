<?php

namespace Database\Seeders;

use App\Models\User;
//use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
        'name' => 'Administrateur',
        'email' => 'admin@gmail.com',
        'password' => '123456',
        'role' => 'admin',
    ]);

    User::create([
        'name' => 'Propriétaire Test',
        'email' => 'proprio@gmail.com',
        'password' => '123456',
        'role' => 'proprietaire',
    ]);

    User::create([
        'name' => 'Etudiant Test',
        'email' => 'etudiant@gmail.com',
        'password' => '123456',
        'role' => 'etudiant',
    ]);
    }
}
