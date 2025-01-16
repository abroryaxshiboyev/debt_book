<?php

namespace Database\Factories;

use App\Models\Shop;
use App\Models\Debtor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Debtor>
 */
class DebtorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'shop_id' => Shop::inRandomOrder()->first()->id,
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
        ];
    }
}
