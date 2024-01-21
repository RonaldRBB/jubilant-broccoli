<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = new User([
            "email" => env('FU_MAIL', 'admin@example.com'),
            "password" => Hash::make(env('FU_PASS', 'secret')),
            "name" => env('FU_NAME', 'Default User'),
        ]);
        $user->saveOrFail();
    }
}
