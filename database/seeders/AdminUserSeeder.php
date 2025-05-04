<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1234'),
            'role' => 'admin', // Set the role in the users table
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // You might still want to create the Employee record with role_task
        \App\Models\Employee::create([
            'user_id' => $adminUser->id,
            'role_task' => 'Administrator', // This can be a more specific employee role
            'work_shift' => '09:00:00',
        ]);
    }
}