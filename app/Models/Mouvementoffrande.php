<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouvementoffrande extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'montant',
        'monnaie',
        'motif',
        'type_offrande',
        'date_concerner',
        'typemouvementoffrande_id',
        'user_id',
    ];

    public function user(){
        $this->belongsTo(User::class);
    }
}
