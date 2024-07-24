<?php

namespace Database\Seeders;

use App\Models\Med;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Med::query()->create([
            'cat_id' => 2,
            'cat_name' => 'Liquids',
            'warehouse_id' => 1,
            'warehouse_name' => 'MedXchange',
            't_name' => 'fenirgic',
            's_name' => 'antiallergic',
            'image' => 'images/fenirgic.jpg',
            'price' => 15000,
            'quantity' => 500,
            'exp_date' => Carbon::parse('2025/1/14'),
            'company' => 'pharma',
        ]);
        Med::query()->create([
            'cat_id' => 2,
            'cat_name' => 'Liquids',
            'warehouse_id' => 2,
            'warehouse_name' => 'PharmaWarehouse',
            't_name' => 'fenirgic',
            's_name' => 'antiallergic',
            'image' => 'images/fenirgic.jpg',
            'price' => 15000,
            'quantity' => 350,
            'exp_date' => Carbon::parse('2024/12/30'),
            'company' => 'pharma',
        ]);

        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 2,
            'warehouse_name' => 'PharmaWarehouse',
            't_name' => 'nebilol',
            's_name' => 'nebivolol',
            'image' => 'images/nebilol.jpg',
            'price' => 10000,
            'quantity' => 600,
            'exp_date' => Carbon::parse('2027/12/29'),
            'company' => 'pharma',
        ]);
        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 3,
            'warehouse_name' => 'HealthStock',
            't_name' => 'nebilol',
            's_name' => 'nebivolol',
            'image' => 'images/nebilol.jpg',
            'price' => 10000,
            'quantity' => 200,
            'exp_date' => Carbon::parse('2028/1/17'),
            'company' => 'pharma',
        ]);

        Med::query()->create([
            'cat_id' => 2,
            'cat_name' => 'Liquids',
            'warehouse_id' => 1,
            'warehouse_name' => 'MedXchange',
            't_name' => 'clarin',
            's_name' => 'loratadine',
            'image' => 'images/clarin.jpg',
            'price' => 20000,
            'quantity' => 400,
            'exp_date' => Carbon::parse('2025/3/7'),
            'company' => 'pharma',
        ]);

        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 3,
            'warehouse_name' => 'HealthStock',
            't_name' => 'diclosan',
            's_name' => 'diclofinac',
            'image' => 'images/diclosan.jpg',
            'price' => 18000,
            'quantity' => 800,
            'exp_date' => Carbon::parse('2027/5/9'),
            'company' => 'pharma',
        ]);
        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 2,
            'warehouse_name' => 'PharmaWarehouse',
            't_name' => 'diclosan',
            's_name' => 'diclofinac',
            'image' => 'images/diclosan.jpg',
            'price' => 18000,
            'quantity' => 500,
            'exp_date' => Carbon::parse('2027/4/9'),
            'company' => 'pharma',
        ]);

        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 3,
            'warehouse_name' => 'HealthStock',
            't_name' => 'aspirin',
            's_name' => 'aspirin',
            'image' => 'images/aspirin.jpg',
            'price' => 8000,
            'quantity' => 1000,
            'exp_date' => Carbon::parse('2028/5/17'),
            'company' => 'pharma',
        ]);
        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 2,
            'warehouse_name' => 'PharmaWarehouse',
            't_name' => 'aspirin',
            's_name' => 'aspirin',
            'image' => 'images/aspirin.jpg',
            'price' => 8000,
            'quantity' => 500,
            'exp_date' => Carbon::parse('2028/6/17'),
            'company' => 'pharma',
        ]);
        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 1,
            'warehouse_name' => 'MedXchange',
            't_name' => 'aspirin',
            's_name' => 'aspirin',
            'image' => 'images/aspirin.jpg',
            'price' => 8000,
            'quantity' => 750,
            'exp_date' => Carbon::parse('2028/8/17'),
            'company' => 'pharma',
        ]);

        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 1,
            'warehouse_name' => 'MedXchange',
            't_name' => 'unadol',
            's_name' => 'paracetamol',
            'image' => 'images/unadol.jpg',
            'price' => 12000,
            'quantity' => 400,
            'exp_date' => Carbon::parse('2027/8/17'),
            'company' => 'unipharma',
        ]);

        Med::query()->create([
            'cat_id' => 4,
            'cat_name' => 'Topical',
            'warehouse_id' => 1,
            'warehouse_name' => 'MedXchange',
            't_name' => 'provita',
            's_name' => 'dexapantinol',
            'image' => 'images/provita.jpg',
            'price' => 20000,
            'quantity' => 400,
            'exp_date' => Carbon::parse('2027/4/4'),
            'company' => 'unipharma',
        ]);
        Med::query()->create([
            'cat_id' => 4,
            'cat_name' => 'Topical',
            'warehouse_id' => 2,
            'warehouse_name' => 'PharmaWarehouse',
            't_name' => 'provita',
            's_name' => 'dexapantinol',
            'image' => 'images/provita.jpg',
            'price' => 20000,
            'quantity' => 250,
            'exp_date' => Carbon::parse('2027/4/4'),
            'company' => 'unipharma',
        ]);

        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 3,
            'warehouse_name' => 'HealthStock',
            't_name' => 'B plus',
            's_name' => 'vit b-comlex + vit c',
            'image' => 'images/B plus.jpg',
            'price' => 18000,
            'quantity' => 400,
            'exp_date' => Carbon::parse('2027/9/9'),
            'company' => 'unipharma',
        ]);

        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 1,
            'warehouse_name' => 'MedXchange',
            't_name' => 'optimum vit',
            's_name' => 'vits',
            'image' => 'images/optimum vit.jpg',
            'price' => 30000,
            'quantity' => 100,
            'exp_date' => Carbon::parse('2027/11/29'),
            'company' => 'unipharma',
        ]);
        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 3,
            'warehouse_name' => 'HealthStock',
            't_name' => 'optimum vit',
            's_name' => 'vits',
            'image' => 'images/optimum vit.jpg',
            'price' => 30000,
            'quantity' => 500,
            'exp_date' => Carbon::parse('2027/10/29'),
            'company' => 'unipharma',
        ]);

        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 2,
            'warehouse_name' => 'PharmaWarehouse',
            't_name' => 'gincoment',
            's_name' => 'ginkgo biloba',
            'image' => 'images/gincoment.jpg',
            'price' => 25000,
            'quantity' => 600,
            'exp_date' => Carbon::parse('2027/4/4'),
            'company' => 'unipharma',
        ]);

        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 1,
            'warehouse_name' => 'MedXchange',
            't_name' => 'unibrofen',
            's_name' => 'ibobrofen',
            'image' => 'images/unibrofen.jpg',
            'price' => 16000,
            'quantity' => 1000,
            'exp_date' => Carbon::parse('2028/5/4'),
            'company' => 'unipharma',
        ]);

        Med::query()->create([
            'cat_id' => 2,
            'cat_name' => 'Liquids',
            'warehouse_id' => 1,
            'warehouse_name' => 'MedXchange',
            't_name' => 'normalax',
            's_name' => 'lactitol monohydrate',
            'image' => 'images/normalax.jpg',
            'price' => 3000,
            'quantity' => 900,
            'exp_date' => Carbon::parse('2027/4/4'),
            'company' => 'human pharma',
        ]);
        Med::query()->create([
            'cat_id' => 2,
            'cat_name' => 'Liquids',
            'warehouse_id' => 2,
            'warehouse_name' => 'PharmaWarehouse',
            't_name' => 'normalax',
            's_name' => 'lactitol monohydrate',
            'image' => 'images/normalax.jpg',
            'price' => 3000,
            'quantity' => 100,
            'exp_date' => Carbon::parse('2027/4/4'),
            'company' => 'human pharma',
        ]);
        Med::query()->create([
            'cat_id' => 2,
            'cat_name' => 'Liquids',
            'warehouse_id' => 3,
            'warehouse_name' => 'HealthStock',
            't_name' => 'normalax',
            's_name' => 'lactitol monohydrate',
            'image' => 'images/normalax.jpg',
            'price' => 3000,
            'quantity' => 350,
            'exp_date' => Carbon::parse('2027/4/4'),
            'company' => 'human pharma',
        ]);

        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 3,
            'warehouse_name' => 'HealthStock',
            't_name' => 'esortex',
            's_name' => 'esomperazole',
            'image' => 'images/esortex.jpg',
            'price' => 7000,
            'quantity' => 700,
            'exp_date' => Carbon::parse('2027/6/13'),
            'company' => 'human pharma',
        ]);

        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 1,
            'warehouse_name' => 'MedXchange',
            't_name' => 'Ravit B12',
            's_name' => 'vit B12',
            'image' => 'images/Ravit B12.jpg',
            'price' => 14000,
            'quantity' => 550,
            'exp_date' => Carbon::parse('2027/7/4'),
            'company' => 'AlRaed',
        ]);

        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 1,
            'warehouse_name' => 'MedXchange',
            't_name' => 'Novepam',
            's_name' => 'Bromazepam',
            'image' => 'images/Novepam.jpg',
            'price' => 17000,
            'quantity' => 850,
            'exp_date' => Carbon::parse('2027/7/17'),
            'company' => 'AlRaed',
        ]);

        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 2,
            'warehouse_name' => 'PharmaWarehouse',
            't_name' => 'Gavirol',
            's_name' => 'antacid',
            'image' => 'images/Gavirol.jpg',
            'price' => 2000,
            'quantity' => 500,
            'exp_date' => Carbon::parse('2027/8/5'),
            'company' => 'Aphamea',
        ]);

        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 3,
            'warehouse_name' => 'HealthStock',
            't_name' => 'omega 3 vit',
            's_name' => 'omega 3 vit',
            'image' => 'images/omega 3 vit.jpg',
            'price' => 40000,
            'quantity' => 1000,
            'exp_date' => Carbon::parse('2028/3/19'),
            'company' => 'Aphamea',
        ]);

        Med::query()->create([
            'cat_id' => 2,
            'cat_name' => 'Liquids',
            'warehouse_id' => 1,
            'warehouse_name' => 'MedXchange',
            't_name' => 'globino',
            's_name' => 'zn, Fe, B12, Folic Acid, cu',
            'image' => 'images/globino.jpg',
            'price' => 17000,
            'quantity' => 500,
            'exp_date' => Carbon::parse('2025/5/8'),
            'company' => 'Aphamea',
        ]);
        Med::query()->create([
            'cat_id' => 2,
            'cat_name' => 'Liquids',
            'warehouse_id' => 2,
            'warehouse_name' => 'PharmaWarehouse',
            't_name' => 'globino',
            's_name' => 'zn, Fe, B12, Folic Acid, cu',
            'image' => 'images/globino.jpg',
            'price' => 17000,
            'quantity' => 250,
            'exp_date' => Carbon::parse('2025/5/8'),
            'company' => 'Aphamea',
        ]);

        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 1,
            'warehouse_name' => 'MedXchange',
            't_name' => 'sytamol',
            's_name' => 'paracetamol',
            'image' => 'images/sytamol.jpg',
            'price' => 3000,
            'quantity' => 1000,
            'exp_date' => Carbon::parse('2028/5/8'),
            'company' => 'tamico',
        ]);
        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 2,
            'warehouse_name' => 'PharmaWarehouse',
            't_name' => 'sytamol',
            's_name' => 'paracetamol',
            'image' => 'images/sytamol.jpg',
            'price' => 3000,
            'quantity' => 1000,
            'exp_date' => Carbon::parse('2028/5/8'),
            'company' => 'tamico',
        ]);
        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 3,
            'warehouse_name' => 'HealthStock',
            't_name' => 'sytamol',
            's_name' => 'paracetamol',
            'image' => 'images/sytamol.jpg',
            'price' => 3000,
            'quantity' => 1000,
            'exp_date' => Carbon::parse('2028/5/8'),
            'company' => 'tamico',
        ]);

        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 3,
            'warehouse_name' => 'HealthStock',
            't_name' => 'Alfares-k',
            's_name' => 'potassium chloride',
            'image' => 'images/Alfares-k.jpg',
            'price' => 20000,
            'quantity' => 300,
            'exp_date' => Carbon::parse('2028/5/8'),
            'company' => 'Alfares',
        ]);

        Med::query()->create([
            'cat_id' => 1,
            'cat_name' => 'Pills',
            'warehouse_id' => 1,
            'warehouse_name' => 'MedXchange',
            't_name' => 'UROMAX Suspension',
            's_name' => 'Solifenacin',
            'image' => 'images/UROMAX Suspension.jpg',
            'price' => 13000,
            'quantity' => 200,
            'exp_date' => Carbon::parse('2027/8/8'),
            'company' => 'Alfares',
        ]);

        Med::query()->create([
            'cat_id' => 3,
            'cat_name' => 'Drops',
            'warehouse_id' => 1,
            'warehouse_name' => 'MedXchange',
            't_name' => 'baby gesic',
            's_name' => 'paracetamol',
            'image' => 'images/baby gesic.jpg',
            'price' => 17000,
            'quantity' => 500,
            'exp_date' => Carbon::parse('2027/5/8'),
            'company' => 'city pharma',
        ]);
        Med::query()->create([
            'cat_id' => 3,
            'cat_name' => 'Drops',
            'warehouse_id' => 2,
            'warehouse_name' => 'PharmaWarehouse',
            't_name' => 'baby gesic',
            's_name' => 'paracetamol',
            'image' => 'images/baby gesic.jpg',
            'price' => 17000,
            'quantity' => 400,
            'exp_date' => Carbon::parse('2027/5/8'),
            'company' => 'city pharma',
        ]);
        Med::query()->create([
            'cat_id' => 3,
            'cat_name' => 'Drops',
            'warehouse_id' => 3,
            'warehouse_name' => 'HealthStock',
            't_name' => 'baby gesic',
            's_name' => 'paracetamol',
            'image' => 'images/baby gesic.jpg',
            'price' => 17000,
            'quantity' => 600,
            'exp_date' => Carbon::parse('2027/5/8'),
            'company' => 'city pharma',
        ]);

        Med::query()->create([
            'cat_id' => 4,
            'cat_name' => 'Topical',
            'warehouse_id' => 1,
            'warehouse_name' => 'MedXchange',
            't_name' => 'zeros',
            's_name' => 'vit c & vit e',
            'image' => 'images/zeros.jpg',
            'price' => 30000,
            'quantity' => 500,
            'exp_date' => Carbon::parse('2027/9/8'),
            'company' => 'zeera',
        ]);

        Med::query()->create([
            'cat_id' => 4,
            'cat_name' => 'Topical',
            'warehouse_id' => 2,
            'warehouse_name' => 'PharmaWarehouse',
            't_name' => 'z.m',
            's_name' => 'zeebium',
            'image' => 'images/zm.jpg',
            'price' => 30000,
            'quantity' => 700,
            'exp_date' => Carbon::parse('2027/9/8'),
            'company' => 'zeera',
        ]);
        Med::query()->create([
            'cat_id' => 4,
            'cat_name' => 'Topical',
            'warehouse_id' => 3,
            'warehouse_name' => 'HealthStock',
            't_name' => 'z.m',
            's_name' => 'zeebium',
            'image' => 'images/zm.jpg',
            'price' => 30000,
            'quantity' => 300,
            'exp_date' => Carbon::parse('2027/9/8'),
            'company' => 'zeera',
        ]);

        Med::query()->create([
            'cat_id' => 3,
            'cat_name' => 'Drops',
            'warehouse_id' => 2,
            'warehouse_name' => 'PharmaWarehouse',
            't_name' => 'prospaqan',
            's_name' => 'spasmolytic',
            'image' => 'images/prospaqan.jpg',
            'price' => 7000,
            'quantity' => 300,
            'exp_date' => Carbon::parse('2025/9/8'),
            'company' => 'itqan',
        ]);
        Med::query()->create([
            'cat_id' => 3,
            'cat_name' => 'Drops',
            'warehouse_id' => 3,
            'warehouse_name' => 'HealthStock',
            't_name' => 'prospaqan',
            's_name' => 'spasmolytic',
            'image' => 'images/prospaqan.jpg',
            'price' => 7000,
            'quantity' => 200,
            'exp_date' => Carbon::parse('2025/10/8'),
            'company' => 'itqan',
        ]);

        Med::query()->create([
            'cat_id' => 3,
            'cat_name' => 'Drops',
            'warehouse_id' => 2,
            'warehouse_name' => 'PharmaWarehouse',
            't_name' => 'madovit d3',
            's_name' => 'vit d3',
            'image' => 'images/madovit d3.jpg',
            'price' => 70000,
            'quantity' => 200,
            'exp_date' => Carbon::parse('2025/3/2'),
            'company' => 'maddox',
        ]);

        Med::query()->create([
            'cat_id' => 5,
            'cat_name' => 'Other',
            'warehouse_id' => 1,
            'warehouse_name' => 'MedXchange',
            't_name' => 'ibusup',
            's_name' => 'ibobofen',
            'image' => 'images/ibusup.jpg',
            'price' => 8000,
            'quantity' => 400,
            'exp_date' => Carbon::parse('2026/12/8'),
            'company' => 'seapharma',
        ]);
        Med::query()->create([
            'cat_id' => 5,
            'cat_name' => 'Other',
            'warehouse_id' => 2,
            'warehouse_name' => 'PharmaWarehouse',
            't_name' => 'ibusup',
            's_name' => 'ibobofen',
            'image' => 'images/ibusup.jpg',
            'price' => 8000,
            'quantity' => 200,
            'exp_date' => Carbon::parse('2026/12/8'),
            'company' => 'seapharma',
        ]);
        Med::query()->create([
            'cat_id' => 5,
            'cat_name' => 'Other',
            'warehouse_id' => 3,
            'warehouse_name' => 'HealthStock',
            't_name' => 'ibusup',
            's_name' => 'ibobofen',
            'image' => 'images/ibusup.jpg',
            'price' => 8000,
            'quantity' => 500,
            'exp_date' => Carbon::parse('2026/12/8'),
            'company' => 'seapharma',
        ]);

        Med::query()->create([
            'cat_id' => 5,
            'cat_name' => 'Other',
            'warehouse_id' => 1,
            'warehouse_name' => 'MedXchange',
            't_name' => 'vibalmin',
            's_name' => 'vit b',
            'image' => 'images/vibalmin.jpg',
            'price' => 20000,
            'quantity' => 400,
            'exp_date' => Carbon::parse('2026/4/22'),
            'company' => 'caspian',
        ]);

        Med::query()->create([
            'cat_id' => 5,
            'cat_name' => 'Other',
            'warehouse_id' => 3,
            'warehouse_name' => 'HealthStock',
            't_name' => 'gohnsons',
            's_name' => 'baby oil',
            'image' => 'images/gohnsons.jpg',
            'price' => 20000,
            'quantity' => 500,
            'exp_date' => Carbon::parse('2026/12/12'),
            'company' => 'gohnsons',
        ]);
        Med::query()->create([
            'cat_id' => 5,
            'cat_name' => 'Other',
            'warehouse_id' => 2,
            'warehouse_name' => 'PharmaWarehouse',
            't_name' => 'gohnsons',
            's_name' => 'baby oil',
            'image' => 'images/gohnsons.jpg',
            'price' => 20000,
            'quantity' => 150,
            'exp_date' => Carbon::parse('2026/12/12'),
            'company' => 'gohnsons',
        ]);
    }
}
