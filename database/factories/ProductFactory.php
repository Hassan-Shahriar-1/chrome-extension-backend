<?php

namespace Database\Factories;

use App\Enums\CurrencyEnum;
use App\Enums\FacebookMarketplaceCategory;
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
            'name' => fake()->name(),
            'desciption' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 5, 1000), // Random price between 5 and 1000
            'currency' => fake()->randomElement(CurrencyEnum::values()),
            'image' => null,
            'category' => fake()->randomElement(FacebookMarketplaceCategory::values()),
            'location' => 'french'
        ];
    }
}
