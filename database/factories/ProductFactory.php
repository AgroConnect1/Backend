<?php
namespace Database\Factories;

use App\Models\Category;
use App\Models\Farmer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'farmer_id' => Farmer::factory(),
            'category_id' => Category::factory(),
            'title' => fake()->word(),
            'price' => fake()->randomFloat(2, 1, 100),
            'type' => fake()->randomElement(['Fruit', 'Vegetable', 'Grain']),
            'description' => fake()->paragraph(),
            'stock_quantity' => fake()->numberBetween(0, 20),
            // 'image_url' => $this->faker->imageUrl(640, 480, 'food', true),
            'image_url'=> fake()->imageUrl(640,480,'food',true),
        ];
    }
}
