<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_telefono',
        'correo',
        'nombre',
        'contenido',
        'fecha'
    ];
}
