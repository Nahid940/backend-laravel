<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AddressBook>
 */
class AddressBookFactory extends Factory
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
            'phone' => fake()->numerify('880-####-######'),
            'email' => fake()->unique()->safeEmail(),
            'gender' => fake()->randomElement(['male', 'female']),
            'age' => rand(18,100),
            'nationality' => 'Bangladesh',
            'created_by' => 1,
            'created_at' => now(),
        ];
    }
}
