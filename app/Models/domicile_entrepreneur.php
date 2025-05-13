<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class domicile_entrepreneur extends Model
{
    use HasFactory;
    protected $table = 'domicile_entrepreneurs';
    protected $fillable = [
        'Entrepreneur_id',
        'rue_domicile_entrepreneur',
        'num_rue_domicile_entrepreneur',
        'ville_domicile_entrepreneur',
        'cp_domicile_entrepreneur',
        'dpt_id',
        'region_id',
    ];

    public function Entrepreneur()
    {
        return $this->belongsTo(Entrepreneur::class, 'Entrepreneur_id', 'id');
    }

    public function dpt()
    {
        return $this->belongsTo(dpt::class, 'dpt_id', 'id');
    }

    public function region()
    {
        return $this->belongsTo(region::class, 'region_id', 'id');
    }
}