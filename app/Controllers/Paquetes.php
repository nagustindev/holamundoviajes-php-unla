<?php

namespace App\Controllers;

use App\Models\PaquetesModel;

class Paquetes extends BaseController
{
    protected $paquetesModel;
    public function __construct()
    {
        // Instancia el modelo para interactuar con la base de datos
        $this->paquetesModel = new PaquetesModel();
    }

    // Muestra el listado de paquetes
    public function list()
    {
        $data['paquetes'] = $this->paquetesModel->getPaquetes(); // Obtiene todos los paquetes
        return view('paquetes/listar', $data); // Carga la vista con los datos
    }

    public function add()
    {
        return view('paquetes/agregar'); // Muestra el formulario de creación
    }

    public function edit($id)
    {
        $data['paquete'] = $this->paquetesModel->getPaquete($id); // Busca al paquete por su ID
        return view('paquetes/editar', $data);
    }

    // Procesa el formulario de creación.
    // Guarda un nuevo paquete en la base de datos.
    public function save()
    {
        $destino = $this->request->getPost('destino');
        $hotel = $this->request->getPost('hotel');
        $transporte = $this->request->getPost('transporte');
        $dias = $this->request->getPost('dias');
        $stock = $this->request->getPost('stock');
        $imagen = $this->request->getFile('imagen');
        $rutaImagen = null;
        if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
            $nombreArchivo = $imagen->getRandomName();
            $imagen->move(ROOTPATH . 'public/uploads', $nombreArchivo);
            $rutaImagen = 'uploads/' . $nombreArchivo;
        }
        $this->paquetesModel->save([
            'destino' => $destino,
            'hotel' => $hotel,
            'transporte' => $transporte,
            'dias' => $dias,
            'stock' => $stock,
            'imagen' => $rutaImagen
        ]);
        return redirect()->to('/paquetes');
    }
    // Procesa el formulario de edición.
    // Actualiza los datos de un paquete existente.
    public function update($id)
    {
        $nuevoDestino = $this->request->getPost('destino');
        $nuevoHotel = $this->request->getPost('hotel');
        $nuevoTransporte = $this->request->getPost('transporte');
        $nuevosDias = $this->request->getPost('dias');
        $nuevoStock = $this->request->getPost('stock');
        $nuevoImagen = $this->request->getFile('imagen');
        $rutaImagen = null;
        if ($nuevoImagen && $nuevoImagen->isValid() && !$nuevoImagen->hasMoved()) {
            $nombreArchivo = $nuevoImagen->getRandomName();
            $nuevoImagen->move(ROOTPATH . 'public/uploads', $nombreArchivo);
            $rutaImagen = 'uploads/' . $nombreArchivo;
        }
        // Siempre pasar 7 argumentos, aunque la imagen sea null
        $this->paquetesModel->updatePaquete($id, $nuevoDestino, $nuevoHotel, $nuevoTransporte, $nuevosDias, $nuevoStock, $rutaImagen);
        return redirect()->to('/paquetes');
    }
    // Elimina un paquete existente.
    public function delete($id)
    {
        $this->paquetesModel->deletePaquete($id); // Borra el paquete de la base de datos
        return redirect()->to('/paquetes');
    }
}
