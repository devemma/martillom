<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Proveedor;
use Illuminate\Http\Request;

class ComprasVentas extends Controller
{
    public function ver_producto($id)
    {
        $nombre1 = Producto::select('nombre')
            ->where('id', $id)->get();

        return $nombre1;
    }

    public function ver_proveedor($id)
    {
        $nombre2 = Proveedor::select('nombre')
            ->where('id', $id)->get();

        return $nombre2;
    }

    public function proveedores()
    {
        $nombre2 = Proveedor::select('id', 'nombre')->get();

        return $nombre2;
    }

    public function productos()
    {
        $nombre2 = Producto::select('id', 'nombre')->get();

        return $nombre2;
    }

    public function precio($id)
    {
        $precio = Producto::select('precio_c')
            ->where('id', $id)->first();

        return $precio;
    }

    public function ventas()
    {
        $nombre2 = Producto::select('id', 'nombre')->get();

        return $nombre2;
    }
}
