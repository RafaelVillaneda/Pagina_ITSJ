<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Método para mostrar una lista de usuarios
    }

    public function show($id)
    {
        // Método para mostrar un usuario específico por su ID
    }

    public function create()
    {
        // Método para mostrar el formulario de creación de usuario
    }

    public function store(Request $request)
    {
        // Método para almacenar un nuevo usuario en la base de datos
    }

    public function edit($id)
    {
        // Método para mostrar el formulario de edición de usuario
    }

    public function update(Request $request, $id)
    {
        // Método para actualizar un usuario en la base de datos
    }

    public function destroy($id)
    {
        // Método para eliminar un usuario de la base de datos
    }
}
