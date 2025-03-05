<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\TestPresentiel;

class TestPresentielController extends Controller
{
    public static function programmerTestPresentiel()
    {
        $dateDisponible = Staff::obtenirDateEtExaminateurDisponible();
    
        if (!$dateDisponible) {
            return response()->json(['message' => 'Aucun examinateur disponible.'], 400);
        }
    
        $event = Event::creerEvenement($dateDisponible);
        $examinateur = $dateDisponible['examinateur'];
    
        Event::attacherExaminateurAEvenement($event, $examinateur);
        TestPresentiel::enregistrerTestPresentiel($examinateur, $dateDisponible);
    
        return response()->json([
            'message' => 'Test programmé avec succès.',
            'event_id' => $event->id,
            'date_debut' => $event->date_debu,
            'examinateur' => $examinateur->user->name,
        ]);
    }
}
