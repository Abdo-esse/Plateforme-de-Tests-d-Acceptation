<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function events() {
        return $this->belongsToMany(Event::class, 'event_staff');
    }

    public static function trouverProchaineDateDisponible()
    {
        $date = now()->addWeek(); // Recherche de la première date disponible à partir d'une semaine
        $maxTentatives = 14; // Limite de 2 semaines

        for ($i = 0; $i < $maxTentatives; $i++) {
            $dateFin = $date->copy()->addHours(2); // Durée du test = 2 heures
            $examinateur = self::trouverExaminateurDisponible($date, $dateFin);

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

    public static function trouverExaminateurDisponible($dateDebut, $dateFin)
    {
        return self::whereDoesntHave('events', function ($query) use ($dateDebut, $dateFin) {
            $query->where(function ($query) use ($dateDebut, $dateFin) {
                $query->where('date_debu', '<', $dateFin)
                      ->where('date_fin', '>', $dateDebut);
            });
        })->first();
    }
}
