<?php

namespace Database\Seeders;

use App\Models\Cat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cat::query()->create(['cat' => 'Pills']);
        Cat::query()->create(['cat' => 'Liquids']);
        Cat::query()->create(['cat' => 'Drops']);
        Cat::query()->create(['cat' => 'Topical']);
        Cat::query()->create(['cat' => 'Other']);
    }
}
