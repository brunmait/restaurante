<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto_id',
        'cantidad',
        'costo_unitario',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}

