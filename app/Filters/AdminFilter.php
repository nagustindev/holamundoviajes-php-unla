<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

/**
 * Filtro "AdminFilter"
 * ---------------------------------------------
 * Protege rutas que solo pueden ver los administradores.
 *   - Antes de ejecutar un controlador, verifica en la sesión si el usuario
 *     tiene el rol "admin". Si no lo tiene, lo redirige a la pantalla de login.
 */
class AdminFilter implements FilterInterface
{
    /**
     * Método "before": se ejecuta ANTES de llamar al controlador/acción.
     *
     * Lógica:
     *   - Abre/obtiene la sesión actual.
     *   - Revisa el valor guardado en la clave 'tipo_usuario'.
     *   - Si no existe o es distinto de 'admin', no permite continuar y hace
     *     una redirección a /auth/login.
     *
     * Retorno:
     *   - Si devuelve un Response (por ejemplo, redirect()), CodeIgniter
     *     detiene la ejecución normal y envía esa respuesta.
     *   - Si no devuelve nada (null), el flujo sigue hacia el controlador.
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Obtenemos el manejador de sesión
        $session = session();

        // Validamos que exista 'tipo_usuario' y que sea exactamente 'admin'
        if (! $session->has('tipo_usuario') || $session->get('tipo_usuario') !== 'admin') {
            // Usuario no autorizado: lo mandamos a la página de login
            return redirect()->to('/auth/login');
        }
        // Si llegó acá, es admin: no devolvemos nada y el request continúa.
    }

    /**
     * Método "after": se ejecuta DESPUÉS de que el controlador devuelve una respuesta.
     *
     * Acá se podría:
     *   - Agregar cabeceras de seguridad,
     *   - Auditar accesos,
     *   - O modificar la respuesta antes de enviarla al navegador.
     *Por ahora no hace nada.
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No hace falta implementar nada acá.
    }
}
