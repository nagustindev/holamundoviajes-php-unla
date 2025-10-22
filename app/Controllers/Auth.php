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
        // Obtener datos del formulario
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

    // Guardar sesión (incluye email para mostrar en vistas)
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
        // Obtener datos del formulario
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('contraseña');

        // Validar usuario existente
        if ($this->authModel->getByEmail($email)) {
            return view('auth/register', ['error' => 'El email ya está registrado']);
        }

        // Hashear la contraseña (para mas seguridad)
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Guardar nuevo usuario
        $this->authModel->insert([
            'email' => $email,
            'contraseña' => $hash,
            'tipo_usuario' => 'cliente'
        ]);

        // Redirigir a la página de login
        return redirect()->to('/auth/login');
    }

    public function admin()
    {
        // La ruta '/auth/admin' está protegida por el filtro 'isAdmin'.
        // Cargamos los paquetes para mostrarlos directamente en el panel admin.
        $paquetesModel = new PaquetesModel();
        $data['paquetes'] = $paquetesModel->getPaquetes();
        $data['email'] = $this->session->get('email');

        return view('auth/admin', $data);
    }

    // Logout
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }
}
