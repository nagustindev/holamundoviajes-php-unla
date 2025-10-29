<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\VentasModel;

class Usuarios extends BaseController
{
    protected $usuariosModel;
    protected $ventasModel;

    public function __construct()
    {
        // Instancia el modelo para interactuar con la base de datos
        $this->usuariosModel = new UsuariosModel();
        $this->ventasModel = new VentasModel();
    }

    // Muestra el listado de usuarios
    public function list()
    {
        $data['usuarios'] = $this->usuariosModel->getUsuarios(); // Obtiene todos los usuarios
        return view('usuarios/listar', $data); // Carga la vista con los datos
    }

    public function mis_viajes()
    {
        // Obtener el ID del usuario de la sesión
        $userId = session()->get('user_id');

        // Obtener los viajes del usuario usando VentasModel
        $data['viajes'] = $this->ventasModel->getViajesUsuario($userId);

        return view('usuarios/mis_viajes', $data);
    }
}
