<?php

namespace App\Models;

use CodeIgniter\Model;

class VentasModel extends Model
{
    protected $table = 'ventas';
    protected $allowedFields = ['id', 'id_usuario', 'id_paquete', 'cantidad', 'fecha_venta'];

    public function getVentas()
    {
        return $this->select('ventas.*, usuarios.email as usuario_email, paquetes.destino as paquete_destino')
            ->join('usuarios', 'usuarios.id = ventas.id_usuario', 'left')
            ->join('paquetes', 'paquetes.id = ventas.id_paquete', 'left')
            ->findAll();
    }

    public function getVenta($id)
    {
        return $this->where('id', $id)->first();
    }

    public function getViajesUsuario($userId)
    {
        return $this->select('ventas.*, paquetes.destino, paquetes.hotel, paquetes.transporte, paquetes.precio, paquetes.imagen, paquetes.dias as duracion, ventas.fecha_venta as fecha_compra, ventas.cantidad')
            ->join('paquetes', 'paquetes.id = ventas.id_paquete', 'left')
            ->where('ventas.id_usuario', $userId)
            ->orderBy('ventas.fecha_venta', 'DESC')
            ->findAll();
    }
}
