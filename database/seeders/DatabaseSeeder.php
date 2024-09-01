<?php

namespace Database\Seeders;

use App\Models\Buyer;
use App\Models\Farmer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Supplier;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(6)->create();
        Buyer::factory(10)->create();
        Farmer::factory(10)->create();
        Product::factory(10)->create();
        Supplier::factory(10)->create();
        Order::factory(20)->create();
    }
}
