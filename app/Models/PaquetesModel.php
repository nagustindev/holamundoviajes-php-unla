<?php

namespace App\Models;

use CodeIgniter\Model;

class PaquetesModel extends Model
{
    protected $table = 'paquetes';
    protected $allowedFields = ['id', 'destino', 'hotel', 'transporte', 'dias', 'noches', 'stock', 'imagen', 'categoria', 'precio', 'descuento', 'es_oferta', 'descripcion'];

    public function getPaquetes()
    {
        return $this->findAll();
    }

    public function getPaquete($id)
    {
        return $this->where('id', $id)->first();
    }

    public function savePaquete($destino, $hotel, $transporte, $dias, $noches, $stock, $imagen, $categoria, $precio, $descuento = 0, $es_oferta = false, $descripcion = '')
    {
        $this->save([
            'destino' => $destino,
            'hotel' => $hotel,
            'transporte' => $transporte,
            'dias' => $dias,
            'noches' => $noches,
            'stock' => $stock,
            'imagen' => $imagen,
            'categoria' => $categoria,
            'precio' => $precio,
            'descuento' => $descuento,
            'es_oferta' => $es_oferta,
            'descripcion' => $descripcion
        ]);
    }

    public function updatePaquete($id, $nuevoDestino, $nuevoHotel, $nuevoTransporte, $nuevoDias, $nuevoNoches, $nuevoStock, $nuevoImagen, $nuevoCategoria, $nuevoPrecio, $nuevoDescuento = 0, $nuevoEsOferta = false, $nuevoDescripcion = '')
    {
        $data = [
            'destino' => $nuevoDestino,
            'hotel' => $nuevoHotel,
            'transporte' => $nuevoTransporte,
            'dias' => $nuevoDias,
            'noches' => $nuevoNoches,
            'stock' => $nuevoStock,
            'categoria' => $nuevoCategoria,
            'precio' => $nuevoPrecio,
            'descuento' => $nuevoDescuento,
            'es_oferta' => $nuevoEsOferta,
            'descripcion' => $nuevoDescripcion
        ];
        if ($nuevoImagen) {
            $data['imagen'] = $nuevoImagen;
        }
        $this->update($id, $data);
    }

    public function deletePaquete($id)
    {
        $this->delete($id);
    }

    public function verificarStock($id, $cantidad = 1)
    {
        $paquete = $this->find($id);
        return $paquete && $paquete['stock'] >= $cantidad;
    }

    public function descontarStock($id, $cantidad = 1)
    {
        $paquete = $this->find($id);
        if ($paquete && $paquete['stock'] >= $cantidad) {
            return $this->update($id, ['stock' => $paquete['stock'] - $cantidad]);
        }
        return false;
    }

    public function getPaquetesConInfoAdicional($userId = null)
    {
        $paquetes = $this->findAll();
        return $this->aplicarEstadosAdicionales($paquetes, $userId);
    }

    private function aplicarEstadosAdicionales($paquetes, $userId = null)
    {
        $stockMinimo = 5;

        $db = \Config\Database::connect();
        $masVendidoQuery = $db->query("
            SELECT id_paquete, SUM(cantidad) as total_vendido
            FROM ventas
            GROUP BY id_paquete
            ORDER BY total_vendido DESC
            LIMIT 1
        ");
        $masVendido = $masVendidoQuery->getRow();
        $destinoPreferido = $masVendido ? $masVendido->id_paquete : null;

        foreach ($paquetes as &$paquete) {
            $paquete['estados'] = [];

            if ($paquete['stock'] == 0) {
                $paquete['estados'][] = 'agotado';
            } elseif ($paquete['stock'] < $stockMinimo) {
                $paquete['estados'][] = 'pocas_plazas';
            }

            if ($paquete['id'] == $destinoPreferido) {
                $paquete['estados'][] = 'destino_preferido';
            }

            if ($userId && $this->esClienteFrecuente($userId)) {
                $paquete['estados'][] = 'cliente_frecuente';
            }
        }

        return $paquetes;
    }

    private function esClienteFrecuente($userId)
    {
        $db = \Config\Database::connect();
        $compras = $db->table('ventas')
            ->where('id_usuario', $userId)
            ->countAllResults();
        return $compras >= 3;
    }

    public function getOfertas()
    {
        return $this->where('es_oferta', true)->findAll();
    }

    public function getPaquetesRegularesConInfoAdicional($userId = null)
    {
        $paquetes = $this->where('es_oferta !=', true)
            ->orWhere('es_oferta', null)
            ->findAll();

        return $this->aplicarEstadosAdicionales($paquetes, $userId);
    }

    public function getPrecioConDescuento($paquete)
    {
        if ($paquete['es_oferta'] && $paquete['descuento'] > 0) {
            return $paquete['precio'] - ($paquete['precio'] * $paquete['descuento'] / 100);
        }
        return $paquete['precio'];
    }
}
