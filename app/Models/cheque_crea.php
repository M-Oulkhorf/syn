<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cheque_crea extends Model
{
    use HasFactory;
    protected $table = 'cheque_creas';
    protected $fillable = [
        'Contrat_id',
        'est_obtenu',
    ];
}
