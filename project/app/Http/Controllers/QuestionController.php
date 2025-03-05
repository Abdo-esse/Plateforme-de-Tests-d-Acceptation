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
        // Calculer le score du candidat
        $totalScore = Resultat::calculerScore($request);
    
        // Vérifier si l'apprenant est admissible au test présentiel
        if ($totalScore > 65) {
            return $this->programmerTestPresentiel();
        }
    
        return response()->json(['message' => 'Votre score est insuffisant pour un test présentiel.']);
    }
    
    
  
    
   
    
   
    
   
    

private function programmerTestPresentiel()
{
    $dateDisponible = Staff::trouverProchaineDateDisponible();
    $examinateur = $dateDisponible['examinateur'];

    if (!$examinateur || !$examinateur->user) {
        return response()->json(['message' => 'Aucun examinateur disponible.'], 400);
    }

    $event = Event::create([
        'name' => 'Test Présentiel',
        'date_debu' => $dateDisponible['date_debut'],
        'date_fin' => $dateDisponible['date_fin'],
    ]);

    // Attacher l'examinateur à l'événement
    $event->staff()->attach($examinateur->id);

    // Enregistrer le test dans TestPresentiel
    TestPresentiel::create([
        'staff_id' => $examinateur->id,
        'candidate_id' => Auth::id(),
        'date_debu' => $dateDisponible['date_debut'],
        'date_fin' => $dateDisponible['date_fin'],
    ]);

    return response()->json([
        'message' => 'Test programmé avec succès.',
        'event_id' => $event->id,
        'date_debut' => $event->date_debu,
        'examinateur' => $examinateur->user->name,
    ]);
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
