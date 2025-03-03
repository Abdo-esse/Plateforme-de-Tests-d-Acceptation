<?php

namespace App\Http\Controllers;

use App\Models\Reponse;
use App\Models\Question;
use App\Models\Resultat;
use App\Models\QuizHistory;
use Illuminate\Http\Request;
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
         dd($totalScore);
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
