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
}
