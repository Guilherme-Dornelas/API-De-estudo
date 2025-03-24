<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'carros_luxo';
    
    protected $fillable = [
        'nome',
        'ano',
        'marca',
        'quilometros_rodados',
        'valor',
        'foto'
    ];
} 