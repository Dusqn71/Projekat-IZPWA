<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Order::create([
            'user_id' => 1,
            'product_id' => 2,
            'quantity' => 1,
            'total_price' => 1999.99,
        ]);

        Order::create([
            'user_id' => 2,
            'product_id' => 3,
            'quantity' => 2,
            'total_price' => 1999.99,
        ]);

        Order::create([
            'user_id' => 1,
            'product_id' => 1,
            'quantity' => 1,
            'total_price' => 1999.99,
        ]);

        Order::create([
            'user_id' => 3,
            'product_id' => 2,
            'quantity' => 1,
            'total_price' => 1999.99,
        ]);

        Order::create([
            'user_id' => 1,
            'product_id' => 1,
            'quantity' => 1,
            'total_price' => 1999.99,
        ]);
    }
}
