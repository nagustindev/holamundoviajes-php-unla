<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    // Definición de la tabla y campos permitidos
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'contraseña', 'tipo_usuario'];

    // Reglas de validación
    protected $validationRules = [
        'email' => 'required|valid_email|is_unique[usuarios.email]',
        'contraseña' => 'required|min_length[6]',
        'tipo_usuario' => 'required|in_list[admin,cliente]'
    ];

    // Mensajes de validación
    protected $validationMessages = [
        'email' => [
            'required' => 'El email es obligatorio',
            'valid_email' => 'Debe ser un email válido',
            'is_unique' => 'Este email ya está registrado'
        ],
        'contraseña' => [
            'required' => 'La contraseña es obligatoria',
            'min_length' => 'La contraseña debe tener al menos 6 caracteres'
        ],
        'tipo_usuario' => [
            'required' => 'El tipo de usuario es obligatorio',
            'in_list' => 'El tipo de usuario debe ser admin o cliente'
        ]
    ];

    // Buscamos al usuario por email
    public function getByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
