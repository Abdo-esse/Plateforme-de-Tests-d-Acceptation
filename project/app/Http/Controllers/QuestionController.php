<?php

namespace App\Http\Controllers;

use App\Models\Reponse;
use App\Models\Question;
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
        // Récupérer la première question
        $question = Question::with('reponses')->first();

        // Récupérer le nombre total de questions
        $totalQuestions = Question::count();

        // Récupérer le score actuel (s'il existe dans la session)
        $score = session('score', 0);
        // dd($question->reponses,$totalQuestions);
        return view('candidate.quiz', compact('question', 'totalQuestions', 'score'));
    }

    /**
     * Passer à la question suivante après soumission de la réponse.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $questionId
     * @return \Illuminate\Http\Response
     */
    public function next(Request $request, $questionId)
    {
        

        // Récupérer la réponse sélectionnée
        $selectedAnswer = Reponse::find($request->input('answer'));

        // Calculer le score
        $score = session('score', 0);
        // if ($selectedAnswer->is_correct) {
        //     $score += 10; // Ajouter 10 points pour une bonne réponse
        // }

        // Mettre à jour le score dans la session
        session(['score' => $score]);

        // Récupérer la question suivante
        $nextQuestion = Question::with('reponses')->where('id', '>', $questionId)->first();

        // Si une question suivante existe, rediriger vers elle
        if ($nextQuestion) {
            return redirect()->route('questions.show', $nextQuestion->id);
        }
         dd('jfjdjdf');
        // Si toutes les questions ont été répondues, afficher le score final
        // return redirect()->route('quiz.results');
    }

    /**
     * Afficher les résultats du quiz.
     *
     * @return \Illuminate\Http\Response
     */
    public function results()
    {
        // Récupérer le score depuis la session
        $score = session('score', 0);

        // Afficher la vue des résultats
        return view('candidate.results', compact('score'));
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
        //
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
