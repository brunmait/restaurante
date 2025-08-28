<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'sku',
        'descripcion',
        'precio',
        'stock',
        'min_stock',
    ];

    public function compras()
    {
        return $this->hasMany(Compra::class);
    }

    public function movimientos()
    {
        return $this->hasMany(InventarioMovimiento::class, 'producto_id');
    }
}
