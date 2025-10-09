<?php

namespace App\Models;

use CodeIgniter\Model;

class PaquetesModel extends Model
{
    // Es el nombre de la tabla en la base de datos.
    // Con esta variable, CodeIgniter sabe que las consultas hechas en este
    // modelo tienen que impactar en la tabla 'paquetes'.
    protected $table = 'paquetes';
    // Sirve para indicarle a CodeIgniter qué campos se pueden insertar o actualizar
    // en la tabla 'paquetes'. En este caso, el id, destino, hotel, transporte, dias, stock, imagen e categoria.
    protected $allowedFields = ['id', 'destino', 'hotel', 'transporte', 'dias', 'stock', 'imagen', 'categoria', 'precio'];
    // Función que retorna todos los paquetes almacenados en la base de datos.
    public function getPaquetes()
    {
        return $this->findAll();
    }
    // Función que retorna el paquete que tenga el ID recibido por parámetro.
    public function getPaquete($id)
    {
        // Indicamos el campo de la tabla 'paquetes' que queremos buscar
        return $this->where('id', $id)->first();
    }
    // Función para crear un paquete.
    // Recibe destino, hotel, transporte, dias, stock, imagen e categoria como parámetros.
    public function savePaquete($destino, $hotel, $transporte, $dias, $stock, $imagen, $categoria, $precio)
    {
        // Indicamos que vamos a crear un paquete con ese 'destino', 'hotel', 'transporte', 'dias', 'stock', 'imagen' , 'categoria', y 'precio'.
        $this->save([
            'destino' => $destino,
            'hotel' => $hotel,
            'transporte' => $transporte,
            'dias' => $dias,
            'stock' => $stock,
            'imagen' => $imagen,
            'categoria' => $categoria,
            'precio' => $precio
        ]);
    }
    // Función para modificar un paquete.
    // Recibe el ID del paquete a modificar, el destino, el hotel, el transporte, los días, el stock, la imagen y la categoria.
    public function updatePaquete($id, $nuevoDestino, $nuevoHotel, $nuevoTransporte, $nuevoDias, $nuevoStock, $nuevoImagen, $nuevoCategoria, $nuevoPrecio)
    {
        // Construimos el array de datos a actualizar
        $data = [
            'destino' => $nuevoDestino,
            'hotel' => $nuevoHotel,
            'transporte' => $nuevoTransporte,
            'dias' => $nuevoDias,
            'stock' => $nuevoStock,
            'categoria' => $nuevoCategoria,
            'precio' => $nuevoPrecio
        ];
        // Solo actualiza la imagen si se subió una nueva
        if ($nuevoImagen) {
            $data['imagen'] = $nuevoImagen;
        }
        $this->update($id, $data);
    }
    // Función para eliminar un paquete.
    // Recibe el ID del paquete a eliminar.
    public function deletePaquete($id)
    {
        $this->delete($id);
    }
}
