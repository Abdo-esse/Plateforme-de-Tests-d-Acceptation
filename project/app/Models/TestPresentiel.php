<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestPresentiel extends Model
{
    use HasFactory;

    protected $fillable = ['staff_id', 'candidate_id', 'date_debu', 'date_fin'];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }
    public static function enregistrerTestPresentiel($examinateur, $dateDisponible)
{
    TestPresentiel::create([
        'staff_id' => $examinateur->id,
        'candidate_id' => Auth::id(),
        'date_debu' => $dateDisponible['date_debut'],
        'date_fin' => $dateDisponible['date_fin'],
    ]);
}
}
