<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker; // Import the Faker library

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); // Create a Faker instance

        for ($i = 1; $i <= 50; $i++) {
            $firstName = $faker->firstName;
            $lastName = $faker->lastName;
            $email = strtolower($firstName) . '.' . strtolower($lastName) . '@example.com'; // Generate a simple email
            
            $user = User::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'password' => Hash::make('password123'), // Use a consistent default password for simplicity
                'role' => 'customer',
            ]);

            Customer::create([
                'user_id' => $user->id,
            ]);
        }
    }
}