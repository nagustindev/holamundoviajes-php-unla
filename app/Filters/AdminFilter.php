<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    /**
     * Ejecutado antes de que el controlador sea llamado.
     * Si el usuario no es admin redirige a login.
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if (! $session->has('tipo_usuario') || $session->get('tipo_usuario') !== 'admin') {
            return redirect()->to('/auth/login');
        }
    }

    /**
     * Ejecutado después del controlador.
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No-op
    }
}
