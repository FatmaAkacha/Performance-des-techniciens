<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'date_debut',
        'date_fin',
        'nombre_installation',
        'moyen',
        'type_installation',
    ];

}

