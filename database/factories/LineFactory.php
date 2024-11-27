<?php

namespace Database\Factories;

use App\Models\Line;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Line>
 */
class LineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $existingCombinations = Line::pluck('book_id', 'word_id')->toArray();

        do {
            $bookId = $this->faker->numberBetween(1, 5);
            $wordId = $this->faker->numberBetween(1, 1000);
        } while (isset($existingCombinations[$wordId]) && $existingCombinations[$wordId] == $bookId);

        return [
            'definition' => $this->faker->sentence(),
            'index_no' => rand(1, 2000),
            'book_id' => $bookId,
            'word_id' => $wordId,
        ];
    }
}
