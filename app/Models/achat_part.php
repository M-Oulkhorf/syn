<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Type\Decimal;

class achat_part extends Model
{
    use HasFactory;

    protected $table = 'achat_parts'; 

    protected $fillable = [
        'Entrepreneur_id',
        'nbr_parts',
        'montant_part',
        'date_achat_part',
    ];

    protected $casts = [
        'Entrepreneur_id' => 'integer',
        'nbr_parts' => 'integer',
        'montant_part' => 'decimal:2',
        'date_achat_part' => 'date',
    ];
}