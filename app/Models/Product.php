<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_producto',
        'referencia',
        'precio',
        'peso',
        'categoria',
        'stock',
        'fecha_creacion',
    ];

    
}
