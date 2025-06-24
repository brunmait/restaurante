<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $fillable = ['user_id', 'archivo'];

   public function usuario()
{
    return $this->belongsTo(User::class, 'user_id'); // 👈 importante que sea 'user_id'
}


}
