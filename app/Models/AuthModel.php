<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    // Definición de la tabla y campos permitidos
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'email', 'contraseña', 'tipo_usuario'];

    // Buscamos al usuario por email
    public function getByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
