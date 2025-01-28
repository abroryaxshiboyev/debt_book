<?php

namespace Database\Factories;

use App\Models\Debtor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'debtor_id'=>Debtor::inRandomOrder()->first()->id,
            'amount'=>$this->faker->randomFloat(2, 1, 1000),
            'payment_date'=>$this->faker->date(),
        ];
    }
}
