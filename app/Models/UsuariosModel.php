<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    // Es el nombre de la tabla en la base de datos.
    // Con esta variable, CodeIgniter sabe que las consultas hechas en este
    // modelo tienen que impactar en la tabla 'usuarios'.
    protected $table = 'usuarios';
    // Sirve para indicarle a CodeIgniter qué campos se pueden insertar o actualizar
    // en la tabla 'usuarios'. En este caso, el id, nombre, email, contraseña y tipo_usuario.
    protected $allowedFields = ['id', 'nombre', 'email', 'contraseña', 'tipo_usuario'];
    // Función que retorna todos los usuarios almacenados en la base de datos.
    public function getUsuarios()
    {
        return $this->findAll();
    }
    // Función que retorna el usuario que tenga el ID recibido por parámetro.
    public function getUsuario($id)
    {
        // Indicamos el campo de la tabla 'usuarios' que queremos buscar
        return $this->where('id', $id)->first();
    }
}
