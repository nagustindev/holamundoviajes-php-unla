<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\PaquetesModel;

class Auth extends BaseController
{
    //Definicion de variables que guardan el modelo para consultas y manejo de sesiones
    protected $authModel;
    protected $session;

    //Constructor que inicializa el modelo y la sesión
    public function __construct()
    {
        $this->authModel = new AuthModel();
        $this->session = session();
    }

    // Página de login
    public function login()
    {
        echo view('auth/login');
    }

    // Procesar login
    public function valida_login()
    {
        // Reglas de validación
        $rules = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'El email es obligatorio',
                    'valid_email' => 'Debe ser un email válido'
                ]
            ],
            'contraseña' => [
                'rules' => 'required|min_length[1]',
                'errors' => [
                    'required' => 'La contraseña es obligatoria',
                    'min_length' => 'La contraseña no puede estar vacía'
                ]
            ]
        ];

        // Validar datos
        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            return view('auth/login', $data);
        }

        // Obtener datos validados
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('contraseña');

        // Buscar usuario en la base de datos
        $user = $this->authModel->getByEmail($email);

        // Verificar si el usuario existe
        if (!$user) {
            return view('auth/login', ['error' => 'Usuario no encontrado']);
        }

        // Verificar la contraseña
        if (!password_verify($password, $user['contraseña'])) {
            return view('auth/login', ['error' => 'Contraseña inválida']);
        }

        // Guardar sesión
        $this->session->set('user_id', $user['id']);
        $this->session->set('tipo_usuario', $user['tipo_usuario']);
        $this->session->set('email', $user['email']);

        // Redirigir según tipo de usuario
        if ($user['tipo_usuario'] === 'admin') {
            return redirect()->to('/auth/admin');
        } else {
            return redirect()->to('/');
        }
    }

    // Página de registro
    public function register()
    {
        echo view('auth/register');
    }

    // Procesar registro
    public function register_post()
    {
        // Reglas de validación
        $rules = [
            'email' => [
                'rules' => 'required|valid_email|is_unique[usuarios.email]',
                'errors' => [
                    'required' => 'El email es obligatorio',
                    'valid_email' => 'Debe ser un email válido',
                    'is_unique' => 'Este email ya está registrado'
                ]
            ],
            'contraseña' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'La contraseña es obligatoria',
                    'min_length' => 'La contraseña debe tener al menos 6 caracteres'
                ]
            ]
        ];

        // Validar datos
        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            return view('auth/register', $data);
        }

        // Obtener datos validados
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('contraseña');

        // Hashear la contraseña
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Guardar nuevo usuario
        $this->authModel->insert([
            'email' => $email,
            'contraseña' => $hash,
            'tipo_usuario' => 'cliente'
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->to('/auth/login')
                        ->with('success', 'Registro exitoso. Ya puedes iniciar sesión');
    }

    public function admin()
    {
        // La ruta '/auth/admin' está protegida por el filtro 'isAdmin'.
        // Cargamos los paquetes para mostrarlos directamente en el panel admin.
        $paquetesModel = new PaquetesModel();
        $data['paquetes'] = $paquetesModel->getPaquetes();

        return view('auth/admin', $data);
    }

    // Logout
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }
}
