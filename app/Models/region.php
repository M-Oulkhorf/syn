<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    use HasFactory;
    protected $table = 'regions';
    protected $fillable = [
        'nom_region',
    ];

    public function domicile_entrepreneur()
    {
        return $this->hasMany(domicile_entrepreneur::class, 'region_id', 'id');
    }
}