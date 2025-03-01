<?php

namespace Database\Seeders;

use App\Models\Reponse;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 // Générer 10 questions avec 3 à 5 réponses chacune
 Question::factory(10)->create()->each(function ($question) {
    Reponse::factory(rand(3, 5))->create([
        'question_id' => $question->id
    ]);
});
    }
}
