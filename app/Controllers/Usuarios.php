<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    protected $usuariosModel;
    public function __construct()
    {
        // Instancia el modelo para interactuar con la base de datos
        $this->usuariosModel = new UsuariosModel();
    }

    // Muestra el listado de usuarios
    public function list()
    {
        $data['usuarios'] = $this->usuariosModel->getUsuarios(); // Obtiene todos los usuarios
        return view('usuarios/listar', $data); // Carga la vista con los datos
    }

    public function mis_viajes()
    {
        return view('usuarios/mis_viajes');
    }
}
