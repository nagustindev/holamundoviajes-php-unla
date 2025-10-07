<?php

namespace App\Controllers;

use App\Models\AuthModel;

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

        // Guardar sesión
        $this->session->set('nombre', $user['nombre']);
        $this->session->set('user_id', $user['id']);
        $this->session->set('tipo_usuario', $user['tipo_usuario']);

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
        $nombre = $this->request->getPost('nombre');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('contraseña');

        // Validar usuario existente
        if ($this->authModel->getByEmail($email)) {
            return view('auth/register', ['error' => 'El email ya está registrado']);
        }

        // Hashear la contraseña
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Guardar nuevo usuario
        $this->authModel->insert([
            'nombre' => $nombre,
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
        // Aquí solo se renderiza la vista de administración.
        echo view('auth/admin', ['username' => $this->session->get('nombre')]);
    }

    // Logout
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/auth/login');
    }
}
