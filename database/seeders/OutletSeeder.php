<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Outlet::create(['name' => 'Outlet 1', 'address' => '123 Main St','phone'=>'081234567890']);
        Outlet::create(['name' => 'Outlet 2', 'address' => '456 Elm St','phone'=>'081234567890']);
        Outlet::create(['name' => 'Outlet 3', 'address' => '789 Oak St','phone'=>'081234567890']);
    }
}
