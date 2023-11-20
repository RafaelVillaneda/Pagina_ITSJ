<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class Controlador_Usuario extends Controller
{
    public function show($nombre_usuario)
{
    // Buscar un registro por nombre de usuario
    $registro = Usuario::where('nombre_usuario', $nombre_usuario)->first();

    if (!$registro) {
        // Manejar el caso en el que el registro no se encuentra
        return response()->json(['mensaje' => 'Registro no encontrado'], 404);
    }

    // Devolver el registro encontrado
    //var_dump($registro);
    return response()->json(['datos' => $registro], 200);
}
}
