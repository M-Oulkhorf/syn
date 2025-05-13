<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $table = 'contrats';

    protected $fillable = [
        'type_Contrat_id',
        'date_signature_contrat',
        'date_fin_contrat',
        'poste_contrat',
    ];

    protected $casts = [
        'date_signature_contrat' => 'date:Y-m-d',
        'date_fin_contrat' => 'date:Y-m-d',
    ];

    public function type_contrat()
    {
        return $this->belongsTo(type_contrat::class, 'type_Contrat_id');
    }
}
