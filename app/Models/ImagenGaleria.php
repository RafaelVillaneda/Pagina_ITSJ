<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenGaleria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'contenido_id'
    ];
}
