<?php

namespace App\Models;

use App\Models\dpt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entrepreneur extends Model
{
    use HasFactory;
    protected $table = 'entrepreneurs';
    protected $fillable = [
        'code_analytique_entrepreneur',
        'nom_entrepreneur',
        'prenom_entrepreneur',
        'sexe_entrepreneur',
        'date_naissance_entrepreneur',
        'lieu_naissance_entrepreneur',
        'nationalite_entrepreneur',
        'numero_ss_entrepreneur',
        'telephone1_entrepreneur',
        'telephone2_entrepreneur',
        'mail_entrepreneur',
        'demandeur_emploi',
        'entrepreneur_actif',
        'cadeau_id',
        'dpt_entree_id',
        'dpt_actuel_id',
        'Accompagnant_id',
        'matricule_silae',
        'date_fin_accompagnement',
        'date_sortie',
    ];

    protected $casts = [
        'date_naissance_entrepreneur' => 'date:Y-m-d',
        'date_fin_accompagnement' => 'date:Y-m-d',
        'date_sortie' => 'date:Y-m-d',
        'demandeur_emploi' => 'boolean',
        'entrepreneur_actif' => 'boolean',
    ];

    public function Cadeau()
    {
        return $this->belongsTo(Cadeau::class, 'cadeau_id', 'id');
    }

    public function domicile_entrepreneur()
    {
        return $this->hasOne(domicile_entrepreneur::class, 'Entrepreneur_id', 'id')->latest();
    }

    public function dpt_entree()
    {
        return $this->belongsTo(dpt::class, 'dpt_entree_id');
    }

    public function dpt_actuel()
    {
        return $this->belongsTo(dpt::class, 'dpt_actuel_id');
    }

    public function accompagnant()
    {
        return $this->belongsTo(Accompagnant::class, 'Accompagnant_id');
    }
    public function travailler()
    {
        return $this->hasMany(Travailler::class, 'Entrepreneur_id');
    }
}
