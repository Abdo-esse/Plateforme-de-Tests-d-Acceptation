<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = ['question_id', 'contenu','score', 'is_correct'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

     /**
     * Récupère toutes les réponses en une seule requête pour améliorer la performance.
     */
    public static function recupererReponses(array $answers)
    {
        return Reponse::whereIn('id', collect($answers)->flatten())->get();
    }
}
