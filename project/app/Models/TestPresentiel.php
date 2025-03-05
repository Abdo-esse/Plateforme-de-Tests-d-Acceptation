<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
