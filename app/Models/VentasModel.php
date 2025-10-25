<?php

namespace App\Models;

use CodeIgniter\Model;

class VentasModel extends Model
{
    // Es el nombre de la tabla en la base de datos.
    // Con esta variable, CodeIgniter sabe que las consultas hechas en este
    // modelo tienen que impactar en la tabla 'ventas'.
    protected $table = 'ventas';
    // Sirve para indicarle a CodeIgniter qué campos se pueden insertar o actualizar
    // en la tabla 'ventas'. En este caso, el id, id_usuario, id_paquete, cantidad y fecha_venta.
    protected $allowedFields = ['id', 'id_usuario', 'id_paquete', 'cantidad', 'fecha_venta'];
    // Función que retorna todos los ventas almacenados en la base de datos.
    public function getVentas()
    {
        return $this->select('ventas.*, usuarios.email as usuario_email, paquetes.destino as paquete_destino')
                    ->join('usuarios', 'usuarios.id = ventas.id_usuario', 'left')
                    ->join('paquetes', 'paquetes.id = ventas.id_paquete', 'left')
                    ->findAll();
    }
    // Función que retorna el venta que tenga el ID recibido por parámetro.
    public function getVenta($id)
    {
        // Indicamos el campo de la tabla 'ventas' que queremos buscar
        return $this->where('id', $id)->first();
    }

    // Función que retorna todos los viajes (ventas) de un usuario específico
    public function getViajesUsuario($userId)
    {
        return $this->select('ventas.*, paquetes.destino, paquetes.hotel, paquetes.transporte, paquetes.precio, paquetes.imagen, paquetes.dias as duracion, ventas.fecha_venta as fecha_compra, ventas.cantidad')
                    ->join('paquetes', 'paquetes.id = ventas.id_paquete', 'left')
                    ->where('ventas.id_usuario', $userId)
                    ->orderBy('ventas.fecha_venta', 'DESC')
                    ->findAll();
    }
}
