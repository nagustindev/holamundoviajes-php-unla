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
        
        // Verificar stock
        if (!$paqueteModel->verificarStock($id)) {
            return redirect()->back()->with('error', 'No hay stock suficiente');
        }
        
        // Descontar stock y registrar venta
        if ($paqueteModel->descontarStock($id)) {
            $this->registrarVenta($id, $userId);
            return redirect()->back()->with('success', 'Compra realizada exitosamente');
        }
        
        return redirect()->back()->with('error', 'Error en la compra');
    }
    
    private function registrarVenta($paqueteId, $userId)
    {
        $db = \Config\Database::connect();
        $db->table('ventas')->insert([
            'id_usuario' => $userId,
            'id_paquete' => $paqueteId,
            'cantidad' => 1,
            'fecha_venta' => date('Y-m-d H:i:s')
        ]);
    }

    public function ayuda(): string
    {
        return view('ayuda/ayuda');
    }
}
