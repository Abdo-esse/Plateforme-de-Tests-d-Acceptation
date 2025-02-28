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
        // Créer une question
        $question = Question::create([
            'contenu' => 'Quelle est la capitale de la France ?',
            'is_multiple' => false
        ]);

        // Ajouter des réponses
        Reponse::create(['question_id' => $question->id, 'contenu' => 'Paris','score'=>32 ,'is_correct' => true]);
        Reponse::create(['question_id' => $question->id, 'contenu' => 'Londres', 'score'=>-32,'is_correct' => false]);
        Reponse::create(['question_id' => $question->id, 'contenu' => 'Berlin', 'score'=>-32,'is_correct' => false]);
    }
}
