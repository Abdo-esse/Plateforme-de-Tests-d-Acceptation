<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'date_debu', 'date_fin'];

    public function staff() {
        return $this->belongsToMany(Staff::class, 'event_staff');
    }

    public static function creerEvenement($dateDisponible)
{
    return Event::create([
        'name' => 'Test Présentiel',
        'date_debu' => $dateDisponible['date_debut'],
        'date_fin' => $dateDisponible['date_fin'],
    ]);
}

public static function attacherExaminateurAEvenement($event, $examinateur)
{
    $event->staff()->attach($examinateur->id);
}
}
