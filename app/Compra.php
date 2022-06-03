<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [
        'fecha',
        'id_proveedor','id_producto',
        'cantidad','monto'
    ];
}
