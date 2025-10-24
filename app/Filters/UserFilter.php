<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class UserFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Verificar si hay argumentos para determinar el comportamiento
        if (!empty($arguments) && $arguments[0] === 'guest') {
            // Comportamiento para páginas guest (login/register)
            // Si el usuario ya está logueado, redirigir al home
            if (session()->get('user_id')) {
                return redirect()->to('/');
            }
        } else {
            // Comportamiento por defecto: requiere usuario logueado
            // Si el usuario NO está logueado, redirigir al login
            if (!session()->get('user_id')) {
                return redirect()->to('/auth/login');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No necesitamos hacer nada después
    }
}