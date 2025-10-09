<?php

namespace App\Controllers;

use App\Models\PaquetesModel;

class Home extends BaseController
{
    public function index(): string
    {
        // Cargar paquetes para mostrarlos en la vista principal
        
        $paquetesModel = new PaquetesModel();
        $data['paquetes'] = $paquetesModel->getPaquetes();

        return view('home/index', $data);
    }
}
