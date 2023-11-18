<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Usuario;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $body = $request->all();
        
        $nombre_usuario = $body['nombre_usuario'];
        $contrasena = $body['contrasena'];
        $usuario = Usuario::where('nombre_usuario', $nombre_usuario);

        if(!$usuario->exists()){
            return response()->json(['msg'=>'usuario inexistente'], 400);
        }

        $usuario = $usuario->first();

        if(!Hash::check($contrasena, $usuario->contrasena)){
            return response()->json(['msg'=>'la contrasena no coincide'], 400);
        }

        Auth::attempt([
            'nombre_usuario' => $nombre_usuario,
            'password' => $usuario->contrasena,
        ]);

        return response()->json(['msg'=>'je'], 200);
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
