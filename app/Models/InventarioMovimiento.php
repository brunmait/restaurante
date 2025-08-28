<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioMovimiento extends Model
{
    use HasFactory;

    protected $table = 'inventario_movimientos';

    protected $fillable = [
        'producto_id',
        'cambio_cantidad',
        'motivo',
        'referencia_tipo',
        'referencia_id',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}

