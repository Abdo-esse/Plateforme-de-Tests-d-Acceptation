<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizHistory extends Model
{
    use HasFactory;

    protected $fillable = ['resultat_id', 'question_id', 'reponse_id'];

    public function resultat()
    {
        return $this->belongsTo(Resultat::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function answer()
    {
        return $this->belongsTo(Reponse::class);
    }

     /**
     * Insère les données d'historique du quiz en une seule requête pour optimiser la performance.
     */
    public static function enregistrerHistoriqueQuiz(array $quizHistoryData)
    {
        if (!empty($quizHistoryData)) {
            QuizHistory::insert($quizHistoryData);
        }
    }
}
