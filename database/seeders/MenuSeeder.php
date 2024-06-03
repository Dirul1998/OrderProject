<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $outlet1 = Outlet::where('name', 'Outlet 1')->first();
        $outlet2 = Outlet::where('name', 'Outlet 2')->first();
        $outlet3 = Outlet::where('name', 'Outlet 3')->first();

        $outlet1->menus()->createMany([
            ['name' => 'Burger', 'description' => 'Tasty beef burger', 'price' => 5.99, 'image' => 'https://example.com/burger.jpg'],
            ['name' => 'Fries', 'description' => 'Crispy french fries', 'price' => 2.99, 'image' => 'https://example.com/fries.jpg'],
        ]);

        $outlet2->menus()->createMany([
            ['name' => 'Pizza', 'description' => 'Delicious cheese pizza', 'price' => 8.99, 'image' => 'https://example.com/pizza.jpg'],
            ['name' => 'Pasta', 'description' => 'Italian style pasta', 'price' => 7.99, 'image' => 'https://example.com/pasta.jpg'],
        ]);

        $outlet3->menus()->createMany([
            ['name' => 'Salad', 'description' => 'Fresh garden salad', 'price' => 4.99, 'image' => 'https://example.com/salad.jpg'],
            ['name' => 'Soup', 'description' => 'Hot chicken soup', 'price' => 3.99, 'image' => 'https://example.com/soup.jpg'],
        ]);
    }
}
