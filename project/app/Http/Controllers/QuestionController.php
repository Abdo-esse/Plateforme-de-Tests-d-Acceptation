<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Staff;
use App\Models\Reponse;
use App\Models\Question;
use App\Models\Resultat;
use App\Models\QuizHistory;
use Illuminate\Http\Request;
use App\Models\TestPresentiel;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::inRandomOrder()->limit(10)->get();
        // dd($questions);
        return view('candidate.quiz',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $totalScore = 0;

        if ($request->has('answers')) {
            $resultat = Resultat::create([
                'user_id' => Auth::id(),
                'total_score' => 0, 
            ]);
    
            foreach ($request->input('answers') as $questionId => $answerIds) {
                $answers = Reponse::whereIn('id', (array)$answerIds)->get();
                
                foreach ($answers as $answer) {
                    QuizHistory::create([
                        'resultat_id' => $resultat->id,
                        'question_id' => $questionId,
                        'reponse_id' => $answer->id,
                    ]);
    
                   
                        $totalScore += $answer->score;
                }
            }
            $resultat->update(['total_score' => $totalScore]);
        }
        // dd($totalScore);
         // Vérifier si l'apprenant est admissible au test présentiel
        //  if ($totalScore > 65) {
            $dateDisponible = $this->trouverProchaineDateDisponible();
        
            // Création de l'événement du test
            $event = Event::create([
                'name' => 'Test Présentiel',
                'date_debu' => $dateDisponible['date_debut'],
                'date_fin' => $dateDisponible['date_fin'],
            ]);
        
            // Assigner un examinateur disponible
            $examinateur = $dateDisponible['examinateur'];
            $event->staff()->attach($examinateur);
        
            // Assigner le test présentiel
            TestPresentiel::create([
                'staff_id' => $examinateur->id,
                'candidate_id' => Auth::id(), // Assurez-vous que l'utilisateur est bien un candidat
                'date_debu' => $event->date_debu,
                'date_fin' => $event->date_fin,
            ]);
        
            dd([
                'message' => 'Test programmé avec succès.',
                'event_id' => $event->id,
                'date_debut' => $event->date_debu,
                'examinateur' => $examinateur->user->name,
            ]);
        // }

        dd(['message' => 'Votre score est insuffisant pour un test présentiel.'], 400);
    }

    private function trouverProchaineDateDisponible() {
        $date = now()->addWeek(); // Recherche de la première date disponible à partir d'une semaine
        $maxTentatives = 14; // Limite de 2 semaines

        for ($i = 0; $i < $maxTentatives; $i++) {
            $dateFin = $date->copy()->addHours(2); // Durée du test = 2 heures
            $examinateur = $this->trouverExaminateurDisponible($date, $dateFin);

            if ($examinateur) {
                return [
                    'date_debut' => $date,
                    'date_fin' => $dateFin,
                    'examinateur' => $examinateur,
                ];
            }

            $date->addDay(); // Essayer le jour suivant
        }

        throw new Exception("Aucune date disponible pour l'examen dans les 2 prochaines semaines.");
    }

    private function trouverExaminateurDisponible($dateDebut, $dateFin) {
        return Staff::whereDoesntHave('events', function ($query) use ($dateDebut, $dateFin) {
            $query->where(function ($query) use ($dateDebut, $dateFin) {
                $query->where('date_debu', '<', $dateFin)
                      ->where('date_fin', '>', $dateDebut);
            });
        })->first();
    
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
