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
}
