<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\WordSet;
use App\Models\Vocabulary;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vocabulary>
 */
class VocabularyFactory extends Factory
{
	protected $model = Vocabulary::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
			'term' => fake()->firstName(),
			'definition' => fake()->text(),
			'word_set_id' => WordSet::inRandomOrder()->value('word_set_id'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
    }
}
