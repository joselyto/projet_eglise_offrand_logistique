<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouvementmateriel extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantite',
        'motif',
        'materiel_id',
        'typemouvementmateriel_id',
        'user_id',
    ];
}
