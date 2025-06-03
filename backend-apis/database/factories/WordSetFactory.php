<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\WordSet;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WordSet>
 */
class WordSetFactory extends Factory
{
    protected $model = WordSet::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
			'title' => fake()->name(),
			'user_id' => User::inRandomOrder()->value('user_id'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
    }
}
