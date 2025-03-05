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
        // if ($totalScore > 65) {
            return TestPresentielController::programmerTestPresentiel();
        // }
    
        // return response()->json(['message' => 'Votre score est insuffisant pour un test présentiel.']);
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
