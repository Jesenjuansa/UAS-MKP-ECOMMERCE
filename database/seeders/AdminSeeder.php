<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::where('email', 'jesen2@gmail.com')->exists() ?: User::create([
    'full_name' => 'jesen juansa',
    'email' => 'jesen2@gmail.com',
    'password' => Hash::make('12345678'),
    'phone_number' => '08123456789',
    'role' => 'admin',
]);

    }
}
