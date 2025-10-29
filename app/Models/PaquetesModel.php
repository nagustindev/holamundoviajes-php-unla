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
    // en la tabla 'paquetes'. En este caso, el id, destino, hotel, transporte, dias, noches, stock, imagen, categoria, precio, descuento, es_oferta y descripcion.
    protected $allowedFields = ['id', 'destino', 'hotel', 'transporte', 'dias', 'noches', 'stock', 'imagen', 'categoria', 'precio', 'descuento', 'es_oferta', 'descripcion'];

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
    // Recibe destino, hotel, transporte, dias, noches, stock, imagen, categoria, precio, descuento, es_oferta y descripcion como parámetros.
    public function savePaquete($destino, $hotel, $transporte, $dias, $noches, $stock, $imagen, $categoria, $precio, $descuento = 0, $es_oferta = false, $descripcion = '')
    {
        // Indicamos que vamos a crear un paquete con ese 'destino', 'hotel', 'transporte', 'dias', 'noches', 'stock', 'imagen' , 'categoria', 'precio', 'descuento', 'es_oferta' y 'descripcion'.
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
    // Función para modificar un paquete.
    // Recibe el ID del paquete a modificar, el destino, el hotel, el transporte, los días, las noches, el stock, la imagen, la categoria, precio, descuento, es_oferta y descripcion.
    public function updatePaquete($id, $nuevoDestino, $nuevoHotel, $nuevoTransporte, $nuevoDias, $nuevoNoches, $nuevoStock, $nuevoImagen, $nuevoCategoria, $nuevoPrecio, $nuevoDescuento = 0, $nuevoEsOferta = false, $nuevoDescripcion = '')
    {
        // Construimos el array de datos a actualizar
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

    //Verificar stock suficiente
    public function verificarStock($id, $cantidad = 1)
    {
        $paquete = $this->find($id);
        return $paquete && $paquete['stock'] >= $cantidad;
    }

    //Descontar stock al comprar
    public function descontarStock($id, $cantidad = 1)
    {
        $paquete = $this->find($id);
        if ($paquete && $paquete['stock'] >= $cantidad) {
            return $this->update($id, ['stock' => $paquete['stock'] - $cantidad]);
        }
        return false;
    }

    //Obtener paquetes con info adicional
    public function getPaquetesConInfoAdicional($userId = null)
    {
        $paquetes = $this->findAll();
        $stockMinimo = 5; // Definir el stock mínimo

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

            // Agotado
            if ($paquete['stock'] == 0) {
                $paquete['estados'][] = 'agotado';
            }
            // Pocas plazas
            elseif ($paquete['stock'] < $stockMinimo) {
                $paquete['estados'][] = 'pocas_plazas';
            }

            // Destino preferido
            if ($paquete['id'] == $destinoPreferido) {
                $paquete['estados'][] = 'destino_preferido';
            }

            // Cliente frecuente (si hay usuario logueado)
            if ($userId && $this->esClienteFrecuente($userId)) {
                $paquete['estados'][] = 'cliente_frecuente';
            }
        }

        return $paquetes;
    }

    // Verificar si es cliente frecuente usando tu tabla ventas
    private function esClienteFrecuente($userId)
    {
        $db = \Config\Database::connect();
        $compras = $db->table('ventas')
                     ->where('id_usuario', $userId)
                     ->countAllResults();
        return $compras >= 3;
    }

    // Función para obtener solo los paquetes que son ofertas
    public function getOfertas()
    {
        return $this->where('es_oferta', true)->findAll();
    }

    // Función para obtener paquetes que NO son ofertas con información adicional
    public function getPaquetesRegularesConInfoAdicional($userId = null)
    {
        $paquetes = $this->where('es_oferta !=', true)
                         ->orWhere('es_oferta', null)
                         ->findAll();
        
        $stockMinimo = 5; // Definir el stock mínimo

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

            // Agotado
            if ($paquete['stock'] == 0) {
                $paquete['estados'][] = 'agotado';
            }
            // Pocas plazas
            elseif ($paquete['stock'] < $stockMinimo) {
                $paquete['estados'][] = 'pocas_plazas';
            }

            // Destino preferido
            if ($paquete['id'] == $destinoPreferido) {
                $paquete['estados'][] = 'destino_preferido';
            }

            // Cliente frecuente (si hay usuario logueado)
            if ($userId && $this->esClienteFrecuente($userId)) {
                $paquete['estados'][] = 'cliente_frecuente';
            }
        }

        return $paquetes;
    }

    // Función para calcular el precio con descuento
    public function getPrecioConDescuento($paquete)
    {
        if ($paquete['es_oferta'] && $paquete['descuento'] > 0) {
            return $paquete['precio'] - ($paquete['precio'] * $paquete['descuento'] / 100);
        }
        return $paquete['precio'];
    }
}
