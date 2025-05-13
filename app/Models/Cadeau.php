<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadeau extends Model
{
    use HasFactory;
    protected $table = 'cadeaus';
    protected $fillable = [
        'donneur',
        'libelle_cadeau',
        'stock_cadeau',
    ];
}