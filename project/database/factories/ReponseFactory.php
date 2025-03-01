<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reponse>
 */
class ReponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'question_id' => Question::factory(), // Associer à une question générée
            'contenu' => $this->faker->sentence(4), // Réponse aléatoire
            'score' => $this->faker->randomElement([10, -10, 0]), // Score entre 10, -10 et 0
            'is_correct' => $this->faker->boolean(25), // 25% de chance d'être correcte
        ];
    }
}
