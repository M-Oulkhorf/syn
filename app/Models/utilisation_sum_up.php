<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class utilisation_sum_up extends Model
{
    use HasFactory;
    protected $table = 'utilisation_sum_ups';
    protected $fillable = [
        'Entrepreneur_id',
        'Activite_id',
        'boitier_sum_up_id',
    ];

    public function Activite()
    {
        return $this->belongsTo(Activite::class, 'Activite_id');
    }
    public function Entrepreneur()
    {
        return $this->belongsTo(Entrepreneur::class, 'Entrepreneur_id');
    }
    public function boitierSumUp()
    {
        return $this->belongsTo(boitier_sum_up::class, 'boitier_sum_up_id');
    }
}
