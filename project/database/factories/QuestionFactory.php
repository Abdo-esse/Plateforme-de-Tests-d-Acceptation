<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'contenu' => $this->faker->sentence(), // Générer une question aléatoire
            'image' => $this->faker->imageUrl(640, 480, 'education', true), // Image aléatoire
            'is_multiple' => $this->faker->boolean(30), // 30% de chance que ce soit une question à choix multiple
        ];
    }
}
