<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_contrat extends Model
{
    use HasFactory;

    protected $table = 'type_contrats';

    protected $fillable = [
        'nom_contrat',
    ];
}
