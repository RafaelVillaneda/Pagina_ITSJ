<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Usuario;
use App\Http\Controllers\Controlador_Usuario;


class AuthController extends Controller
{
    public function login(Request $request)
{
    $body = $request->all();
    
    $nombre_usuario = $body['nombre_usuario'];
    $contrasena = $body['contrasena'];

    // Buscar un usuario en la base de datos por nombre de usuario
    $usuario = Usuario::where('nombre_usuario', $nombre_usuario)->first();
    
    if (!$usuario) {
        return response()->json(['msg' => 'Usuario inexistente'], 400);
    }

    // Verificar si la contraseña proporcionada coincide con la almacenada en la base de datos
    if (Hash::check($contrasena, $usuario->contrasena)) {
        return response()->json(['msg' => 'Inicio de sesión exitoso'], 200);
    } else {
        return response()->json(['msg' => 'La contraseña no coincide'], 400);
    }
}

    public function register(Request $request)
    {
        $body = $request->all();
        
        $nombre_usuario = $body['nombre_usuario'];
        $contrasena = $body['contrasena'];
        $apellido_paterno = $body['apellido_paterno'];
        $apellido_materno = $body['apellido_materno'];
        $nombre = $body['nombre'];

        $usuario = Usuario::create([
            'nombre_usuario' => $nombre_usuario,
            'apellido_paterno' => $apellido_materno,
            'apellido_materno' => $apellido_paterno,
            'nombre' => $nombre,
            'contrasena' => $contrasena,
        ]);
        
        return response()->json(['msg'=>'usuario creado'], 200);
    }
}