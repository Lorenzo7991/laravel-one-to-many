<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        $slug = Str::slug($title); // Genera lo slug a partire dal titolo

        return [
            'title' => $title,
            'description' => $this->faker->sentence(),
            'start_date' => now(),
            'end_date' => now()->addDays($this->faker->numberBetween(30, 365)),
            'technologies_used' => $this->faker->words(3, true),
            'status' => $this->faker->randomElement(['Progress', 'Completed', 'Suspended']),
            'thumb' => $this->faker->imageUrl(),
            'documentation' => $this->faker->url,
            'slug' => $slug, // Assegna lo slug al campo del modello
        ];
    }
}
