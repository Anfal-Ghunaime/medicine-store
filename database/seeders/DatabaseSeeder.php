<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Controllers\OrderController;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            WarehouseSeeder::class,
            CatSeeder::class,
            MedSeeder::class,
            //OrderSeeder::class,
        ]);
    }
}
