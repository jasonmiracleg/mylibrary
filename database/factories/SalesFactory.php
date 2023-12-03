<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sales>
 */
class SalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'shop_id' => mt_rand(1, 10),
            'user_id' => mt_rand(1, 5),
            'book_id' => mt_rand(1, 10),
            'book_amount' => mt_rand(1, 5)
        ];
    }
}
