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

    // Procesa el formulario de creación.
    // Guarda un nuevo paquete en la base de datos.
    public function save()
    {
        $destino = $this->request->getPost('destino');
        $hotel = $this->request->getPost('hotel');
        $transporte = $this->request->getPost('transporte');
        $dias = $this->request->getPost('dias');
        $noches = $this->request->getPost('noches');
        $stock = $this->request->getPost('stock');
        $precio = $this->request->getPost('precio');
        $descuento = $this->request->getPost('descuento') ?? 0;
        $es_oferta = $this->request->getPost('es_oferta') ? true : false;
        $descripcion = $this->request->getPost('descripcion') ?? '';
        $imagen = $this->request->getFile('imagen');
        $rutaImagen = null;
        $categoria = $this->request->getPost('categoria');
        
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
            'noches' => $noches,
            'stock' => $stock,
            'imagen' => $rutaImagen,
            'categoria' => $categoria,
            'precio' => $precio,
            'descuento' => $descuento,
            'es_oferta' => $es_oferta,
            'descripcion' => $descripcion
        ]);
        return redirect()->to('auth/admin');
    }
    // Procesa el formulario de edición.
    // Actualiza los datos de un paquete existente.
    public function update($id)
    {
        $nuevoDestino = $this->request->getPost('destino');
        $nuevoHotel = $this->request->getPost('hotel');
        $nuevoTransporte = $this->request->getPost('transporte');
        $nuevosDias = $this->request->getPost('dias');
        $nuevoNoches = $this->request->getPost('noches');
        $nuevoStock = $this->request->getPost('stock');
        $nuevoImagen = $this->request->getFile('imagen');
        $nuevoPrecio = $this->request->getPost('precio');
        $nuevoDescuento = $this->request->getPost('descuento') ?? 0;
        $nuevoEsOferta = $this->request->getPost('es_oferta') ? true : false;
        $nuevoDescripcion = $this->request->getPost('descripcion') ?? '';
        $rutaImagen = null;
        $categoria = $this->request->getPost('categoria');
        
        if ($nuevoImagen && $nuevoImagen->isValid() && !$nuevoImagen->hasMoved()) {
            $nombreArchivo = $nuevoImagen->getRandomName();
            $nuevoImagen->move(ROOTPATH . 'public/uploads', $nombreArchivo);
            $rutaImagen = 'uploads/' . $nombreArchivo;
        }
        
        // Actualizar con los nuevos campos
        $this->paquetesModel->updatePaquete($id, $nuevoDestino, $nuevoHotel, $nuevoTransporte, $nuevosDias, $nuevoNoches, $nuevoStock, $rutaImagen, $categoria, $nuevoPrecio, $nuevoDescuento, $nuevoEsOferta, $nuevoDescripcion);
        return redirect()->to('auth/admin');
    }
    // Elimina un paquete existente.
    public function delete($id)
    {
        $this->paquetesModel->deletePaquete($id); // Borra el paquete de la base de datos
        return redirect()->to('auth/admin');
    }
}
