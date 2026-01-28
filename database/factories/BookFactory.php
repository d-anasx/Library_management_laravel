<?php

namespace Database\Factories;
use App\Models\Book;
use App\Models\Categorie;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Book::class;
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'author' => fake()->name(),
            'categorie_id' => Categorie::inRandomOrder()->first()->id,
            'quantity' => fake()->numberBetween(1, 20),
        ];
    }
}
