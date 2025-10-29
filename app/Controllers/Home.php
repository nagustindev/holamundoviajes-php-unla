<?php

namespace App\Controllers;

use App\Models\PaquetesModel;

class Home extends BaseController
{
    public function index(): string
    {
        // Cargar paquetes para mostrarlos en la vista principal

        $paquetesModel = new PaquetesModel();
        $userId = session()->get('user_id') ?? null; // Obtener ID del usuario logueado o null si no está logueado
        $data['paquetes'] = $paquetesModel->getPaquetesRegularesConInfoAdicional($userId); // Solo paquetes regulares (no ofertas)
        $data['ofertas'] = $paquetesModel->getOfertas(); // Cargar ofertas para la sección de ofertas

        return view('home/index', $data);
    }

    public function comprar($id)
    {
        $paqueteModel = new PaquetesModel();
        $userId = session()->get('user_id') ?? null; // Obtener ID del usuario logueado o null si no está logueado

        if (!$userId) {
            return redirect()->back()->with('error', 'Debe iniciar sesión para comprar');
        }

        // Obtener cantidad del parámetro GET, por defecto 1
        $cantidad = (int)($this->request->getGet('cantidad') ?? 1);

        // Validar cantidad mínima
        if ($cantidad < 1) {
            return redirect()->back()->with('error', 'La cantidad debe ser mayor a 0');
        }

        // Verificar stock suficiente para la cantidad solicitada
        if (!$paqueteModel->verificarStock($id, $cantidad)) {
            return redirect()->back()->with('error', 'No hay stock suficiente para la cantidad solicitada');
        }

        // Descontar stock y registrar venta
        if ($paqueteModel->descontarStock($id, $cantidad)) {
            $this->registrarVenta($id, $userId, $cantidad);
            return redirect()->back()->with('success', "¡Compra realizada exitosamente! ({$cantidad} paquete" . ($cantidad > 1 ? 's' : '') . " reservados)");
        }

        return redirect()->back()->with('error', 'Error en la compra');
    }

    private function registrarVenta($paqueteId, $userId, $cantidad = 1)
    {
        $db = \Config\Database::connect();
        $db->table('ventas')->insert([
            'id_usuario' => $userId,
            'id_paquete' => $paqueteId,
            'cantidad' => $cantidad,
            'fecha_venta' => date('Y-m-d H:i:s')
        ]);
    }
}
