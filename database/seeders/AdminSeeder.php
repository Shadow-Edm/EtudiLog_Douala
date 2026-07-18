<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([

            'name' => 'Admin',

            'email' => 'admin@etudilog.com',

            'password' => Hash::make('admin123'),

            'telephone' => '690000000',

            'role' => 'admin',

            'is_verified' => true

        ]);

    }
}
