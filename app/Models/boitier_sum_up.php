<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class boitier_sum_up extends Model
{
    use HasFactory;

    protected $table = 'boitier_sum_ups';
    protected $fillable = [
        'num_sum_up',
    ];
}
