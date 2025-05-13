<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accompagnant extends Model
{
    use HasFactory;

    protected $table = 'accompagnants';

    protected $fillable = [
        'nom_accompagnant',
    ];
}
