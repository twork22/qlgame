<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\ReportedSet;
use App\Models\WordSet;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReportedSet>
 */
class ReportedSetFactory extends Factory
{
    protected $model = ReportedSet::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
			'word_set_id' => WordSet::inRandomOrder()->value('word_set_id'),
			'user_id' => User::inRandomOrder()->value('user_id'),
			'reason' => fake()->realTextBetween(20, 50),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
    }
}
