<?php

namespace App\Controllers;

use App\Models\VentasModel;

class Ventas extends BaseController
{
    protected $ventasModel;
    public function __construct()
    {
        // Instancia el modelo para interactuar con la base de datos
        $this->ventasModel = new VentasModel();
    }

    // Muestra el listado de ventas
    public function list()
    {
        $data['ventas'] = $this->ventasModel->getVentas(); // Obtiene todos los ventas
        return view('ventas/listar', $data); // Carga la vista con los datos
    }
}
