<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'client_id',
        'date_debut',
        'date_fin',
        'nombre_installation',
        'moyen',
        'type_installation',
        'status'
    ];
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}