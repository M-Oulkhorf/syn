<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class visite_medicale extends Model
{
    use HasFactory;
    protected $table = 'visite_medicales';
    protected $fillable = [
        'Entrepreneur_id',
        'date_visite',
        'date_prochaine_visite',
        'resultat_visite',
    ];

    protected $casts = [
        'date_visite' => 'date:Y-m-d',
        'date_prochaine_visite' => 'date:Y-m-d',
    ];
}