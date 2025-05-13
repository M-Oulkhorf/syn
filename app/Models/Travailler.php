<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travailler extends Model
{
    use HasFactory;

    protected $table = 'travaillers';

    protected $fillable = [
        'College_id',
        'Entrepreneur_id',
        'Entite_id',
        'Contrat_id',
        'Activite_id',
        'visite_medicale_id',
        'dpt_id',
        'region_id',
        'date_access_societariat',
        'adhesion_en_cours',
        'fiche_site'
    ];

    protected $casts = [
        'date_access_societariat' => 'date',
        'adhesion_en_cours' => 'boolean',
    ];

    public function Contrat()
    {
        return $this->belongsTo(Contrat::class, 'Contrat_id');
    }

    public function visite_medicale()
    {
        return $this->belongsTo(visite_medicale::class, 'visite_medicale_id');
    }

    public function College()
    {
        return $this->belongsTo(College::class, 'College_id');
    }

    public function Entite()
    {
        return $this->belongsTo(Entite::class, 'Entite_id');
    }

    public function Entrepreneur()
    {
        return $this->belongsTo(Entrepreneur::class, 'Entrepreneur_id');
    }

    public function Activite()
    {
        return $this->belongsTo(Activite::class, 'Activite_id');
    }
}