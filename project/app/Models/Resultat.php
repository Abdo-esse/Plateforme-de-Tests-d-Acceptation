<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resultat extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total_score'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
{
    return $this->hasMany(QuizHistory::class);
}

  /**
     * Crée un enregistrement de résultat pour l'utilisateur actuel.
     */
    public static function creerResultat()
    {
        return Resultat::create([
            'user_id' => Auth::id(),
            'total_score' => 0,
        ]);
    }

     /**
     * Traite les réponses de l'utilisateur et calcule le score total.
     */
    public static function traiterReponses(array $answers, $resultatId)
    {
        $totalScore = 0;
        $quizHistoryData = [];
        $allAnswers = Reponse::recupererReponses($answers);
    
        foreach ($answers as $questionId => $answerIds) {
            foreach ((array)$answerIds as $answerId) {
                $answer = $allAnswers->firstWhere('id', $answerId);
    
                if ($answer) {
                    $quizHistoryData[] = [
                        'resultat_id' => $resultatId,
                        'question_id' => $questionId,
                        'reponse_id' => $answer->id,
                    ];
                    $totalScore += $answer->score;
                }
            }
        }
        QuizHistory::enregistrerHistoriqueQuiz($quizHistoryData);
    
        return $totalScore;
    }

    public static function calculerScore( $request)
    {
        if (!$request->has('answers')) {
            return 0;
        }
    
        $resultat = Resultat::creerResultat();
        $totalScore = Resultat::traiterReponses($request->input('answers'), $resultat->id);
        $resultat->update(['total_score' => $totalScore]);
    
        return $totalScore;
    }
}
