<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [
        'fecha','id_producto',
        'cantidad','monto'
    ];
}
