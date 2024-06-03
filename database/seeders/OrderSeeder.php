<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Outlet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $outlet1 = Outlet::where('name', 'Outlet 1')->first();
        $menu1 = $outlet1->menus()->where('name', 'Burger')->first();

        Order::create([
            'outlet_id' => $outlet1->id,
            'menu_id' => $menu1->id,
            'customer_name' => 'Customer 1',
            'customer_phone' => '081234567890',
            'quantity' => 2,
            'total_price' => $menu1->price * 2,
        ]);

        $outlet2 = Outlet::where('name', 'Outlet 2')->first();
        $menu2 = $outlet2->menus()->where('name', 'Pizza')->first();

        Order::create([
            'outlet_id' => $outlet2->id,
            'menu_id' => $menu2->id,
            'customer_name' => 'Customer 2',
            'customer_phone' => '081234567890',
            'quantity' => 1,
            'total_price' => $menu2->price,
        ]);

        $outlet3 = Outlet::where('name', 'Outlet 3')->first();
        $menu3 = $outlet3->menus()->where('name', 'Salad')->first();

        Order::create([
            'outlet_id' => $outlet3->id,
            'menu_id' => $menu3->id,
            'customer_name' => 'Customer 3',
            'customer_phone' => '081234567890',
            'quantity' => 1,
            'total_price' => $menu3->price,
        ]);
    }
}
