<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Product 1',
            'description' => 'Description for Product 1',
            'price' => 100,
            'category_id' => 1,
            'is_active' => true,
        ]);

        Product::create([
            'name' => 'Product 2',
            'description' => 'Description for Product 2',
            'price' => 200,
            'category_id' => 2,
            'is_active' => true,
        ]);
    }
}
