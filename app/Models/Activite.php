<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Type\Decimal;

class Activite extends Model
{
    use HasFactory;
    protected $table = 'activites';
    protected $fillable = [
        'nom_activite',
        'nom_commercial',
        'mot_cle_activite',
        'lien_boutique_en_ligne',
        'necessite_stock',
        'description_activite',
        'rcpro_activite',
        'marge_salaire_activite',
        'salaire_activite',
        'date_dernier_etat_stock',
    ];

    protected $casts = [
        'date_dernier_etat_stock' => 'date:Y-m-d',
        'necessite_stock' => 'boolean',
        'marge_salaire_activite' => 'decimal:2', 
        'salaire_activite' => 'decimal:2',       
    ];
}