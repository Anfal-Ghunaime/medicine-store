<?php

namespace Database\Seeders;

use App\Http\Controllers\OrderController;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $orderController;

    public function __construct(OrderController $orderController)
    {
        $this->orderController = $orderController;
    }

    public function run(): void
    {
        $requestData = [
            'Meds' => [
                ['med' => 'fenirgic', 'quantity' => 100],
                ['med' => 'clarin', 'quantity' => 3],
            ]
        ];
        $this->orderController->order($requestData);
    }
}
