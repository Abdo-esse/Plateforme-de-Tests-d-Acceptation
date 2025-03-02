<?php

namespace App\Http\Controllers;

use App\Models\Reponse;
use App\Models\Question;
use App\Models\Resultat;
use Illuminate\Http\Request;

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
            // Créer l'historique du quiz d'abord
            $quizHistory = QuizHistory::create([
                'user_id' => Auth::id(),
                'total_score' => 0, // Le score sera mis à jour plus tard
            ]);
    
            foreach ($request->input('answers') as $questionId => $answerIds) {
                $answers = Reponse::whereIn('id', (array)$answerIds)->get();
                
                foreach ($answers as $answer) {
                    // Stocker la réponse choisie par l'apprenant
                    QuizAnswer::create([
                        'quiz_history_id' => $quizHistory->id,
                        'question_id' => $questionId,
                        'answer_id' => $answer->id,
                    ]);
    
                    // Calculer le score si la réponse est correcte
                    if ($answer->is_correct) {
                        $totalScore += $answer->score;
                    }
                }
            }
    
            // Mettre à jour le score total après le calcul
            $quizHistory->update(['total_score' => $totalScore]);
        }
    

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
