<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'is_warehouse' => true,
            'name' => 'MedXchange',
            'phone' => '0912345678',
            'password' => '12345',
        ]);
        User::query()->create([
            'is_warehouse' => true,
            'name' => 'PharmaWarehouse',
            'phone' => '0998765432',
            'password' => '98765',
        ]);
        User::query()->create([
            'is_warehouse' => true,
            'name' => 'HealthStock',
            'phone' => '0910111213',
            'password' => '12345',
        ]);
    }
}
