<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // In AdminUserSeeder.php
public function run()
{
    \App\Models\User::create([
        'name' => 'Admin User',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('password'),
        'usertype' => 'admin',
        'email_verified_at' => now(),
    ]);
}
}
