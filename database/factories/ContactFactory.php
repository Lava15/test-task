<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fullName = fake()->firstName . ' ' . fake()->name . ' ' . fake()->lastName;
        return [
            'full_name' => $fullName,
            'birthday' => fake()->date('Y_m_d', '-10 year'),
        ];
    }
}
