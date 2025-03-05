<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Staff;
use App\Models\Candidate;
use App\Models\TestPresentiel;
use App\Models\Event;
use App\Models\Resultat;
use App\Models\QuizHistory;
use App\Models\Reponse;
use App\Models\Question;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

    // Créer 20 utilisateurs pour éviter un manque de candidats
for ($i = 0; $i < 20; $i++) {
    $user = User::create([
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('password'),
    ]);

    // Alternance entre staff et candidat
    if ($i % 2 == 0) {
        Candidate::create([
            'user_id' => $user->id,
            'address' => $faker->address,
            'phone' => $faker->phoneNumber,
            'identity_card' => $faker->numberBetween(100000, 999999),
            'birth_date' => $faker->date('Y-m-d', '2000-01-01'),
            'campus' => $faker->word,
        ]);
    } else {
        Staff::create([
            'user_id' => $user->id,
        ]);
    }
}


    // Assurez-vous que les `candidate_id` existent dans la table `users`
    $staffMembers = Staff::all();
    $candidates = Candidate::all();
    
    // Créer des tests présentiels
    for ($i = 0; $i < 10; $i++) {
        // Assurez-vous de récupérer un candidat valide
        $staff = Staff::inRandomOrder()->first();
        
        $candidate = Candidate::inRandomOrder()->first(); // 🔥 Assurez-vous que ce candidat existe
        if ($candidate) {
            TestPresentiel::create([
                'staff_id' => $staff->id,
                'candidate_id' => $candidate->id, // 🔥 Vérifiez que ce candidat a un user_id valide
                'date_debu' => now(),
                'date_fin' => now()->addDays(5),
            ]);
        }
    }
        // 🔹 Créer 5 questions
        for ($i = 0; $i < 5; $i++) {
            $question = Question::create([
                'contenu' => $faker->sentence(),
            ]);

            // Ajouter 4 réponses par question
            for ($j = 0; $j < 4; $j++) {
                Reponse::create([
                    'question_id' => $question->id,
                    'contenu' => $faker->sentence(),
                    'score' => $faker->numberBetween(0, 10),
                    'is_correct' => ($j == 0), // La première réponse est correcte
                ]);
            }
        }

        // 🔹 Générer 5 résultats de quiz
        foreach (User::all() as $user) {
            $resultat = Resultat::create([
                'user_id' => $user->id,
                'total_score' => $faker->numberBetween(0, 100),
            ]);

            // Associer des réponses aux résultats de quiz
            $questions = Question::all();
            foreach ($questions as $question) {
                QuizHistory::create([
                    'resultat_id' => $resultat->id,
                    'question_id' => $question->id,
                    'reponse_id' => $question->reponses->random()->id,
                ]);
            }
        }
    }
}
