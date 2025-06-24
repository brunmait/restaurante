<?php

// app/Models/Venta.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = ['user_id', 'producto', 'cantidad', 'precio', 'total'];

    public function cajero()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
