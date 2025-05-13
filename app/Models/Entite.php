<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entite extends Model
{
    use HasFactory;
    protected $table = 'entites';
    protected $fillable = [
        'nom_entite',
    ];
    public function Travailler()
    {
        return $this->hasMany(Travailler::class, 'Entite_id');
    }
}
