<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dpt extends Model
{
    use HasFactory;
    protected $table = 'dpts';
    protected $fillable = [
        'nom_dpt',
    ];

    public function domicile_entrepreneur()
    {
        return $this->hasMany(domicile_entrepreneur::class, 'dpt_id', 'id');
    }
}
