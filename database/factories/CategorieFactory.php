<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categorie>
 */
class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement([
                'Fiction',
                'Non-Fiction',
                'Science Fiction',
                'Mystery',
                'Romance',
                'Thriller',
                'Biography',
                'History',
                'Science',
                'Self-Help'
            ]),
        ];
    }
}
