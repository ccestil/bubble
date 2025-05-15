<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import the DB facade

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Use insert to create multiple services at once
        DB::table('services')->insert([
            [
                'service_name' => 'Self-service',
                'price_per_kg' => '30.00',
            ],
            [
                'service_name' => 'Drop-off',
                'price_per_kg' => '50.00',
            ],
        ]);
    }
}