<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Irfan Rasnan Syah",
            "username" => "irfansyah",
            "email" => "rasnansyah@gmail.com",
            "email_verified_at" => now(),
            "password" => Hash::make("123"),
            "is_admin" => 1,
            "remember_token" => Str::random(10),
        ]);
        User::create([
            "name" => "guest",
            "username" => "guest",
            "email" => "guest@gmail.com",
            "email_verified_at" => now(),
            "password" => Hash::make("123"),
            "remember_token" => Str::random(10),
        ]);
    }
}
