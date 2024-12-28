<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Brand;
use App\Models\Models;
use App\Models\Car;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Agus',
            'email' => 'agus@gmail.com',
            'password' => Hash::make('agus'),
            'role' => 'user',
        ]);
        Brand::factory()->create([
            'name' => 'Ini Brand',
        ]);
        Models::factory()->create([
            'brand_id' => 1,
            'code' => '001',
            'name' => 'Ini Model',
        ]);

        for ($i = 1; $i <= 10; $i++) {
            Car::factory()->create([
                'model_id' => 1,
                'name' => 'Mobil ' . $i,
                'plate_number' => 'A ' . $i . ' BBB',
                'transmission' => 'manual',
                'tax' => '900000',
                'exp_date' => '2022-12-31',
                'year' => '2021',
                'color' => 'Merah',
                'kilometers' => '10000',
                'registration_area' => 'Jakarta',
                'cc_engine' => '1000',
                'image' => 'cars/hi1orSnuFJX8SoWnabgaKC6yNBVx9zvhzq3f0bYW.jpg',
                'price' => '100000000',
                'description' => 'Mobil ' . $i . ' ini adalah mobil yang sangat bagus',
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            Car::factory()->create([
                'model_id' => 1,
                'name' => 'Motor ' . $i,
                'plate_number' => 'C ' . $i . ' BBB',
                'transmission' => 'manual',
                'tax' => '900000',
                'exp_date' => '2022-12-31',
                'year' => '2021',
                'color' => 'Biru',
                'kilometers' => '10000',
                'registration_area' => 'Jakarta',
                'cc_engine' => '1000',
                'image' => 'cars/jJM5n8V2lYzBF7M5ZXa97VHgSm00EAB1TN4viAKd.jpg',
                'price' => '100000000',
                'description' => 'Motor ' . $i . ' ini adalah motor terbaik',
            ]);
        }

    }
}
