<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion', 'existencia',
        'precio_v', 'precio_c'
    ];
}
