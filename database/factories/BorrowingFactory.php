<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrowing>
 */
class BorrowingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $count = Book::count();
        return [
            'name' => fake()->name(),
            'book_id' => fake()->numberBetween(1, $count),
            'borrow_date' => fake()->date(),
            'return_date' => fake()->date(),
        ];
    }
}
