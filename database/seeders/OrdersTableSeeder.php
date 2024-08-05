<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        Order::create([
            'user_id' => 1, // Assuming user ID 1 exists
            'status' => 'pending',
            'total' => 300,
        ]);

        Order::create([
            'user_id' => 2, // Assuming user ID 2 exists
            'status' => 'completed',
            'total' => 500,
        ]);
    }
}
