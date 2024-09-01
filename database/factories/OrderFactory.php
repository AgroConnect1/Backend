<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Link to a user
            'product_id' => Product::factory(), // Link to a product
            'quantity' => fake()->numberBetween(1, 10),
            'total_price' => fake()->randomFloat(2, 10, 1000),
            'status' => fake()->randomElement(['pending', 'processing', 'completed', 'canceled']),
        ];
    }
}
