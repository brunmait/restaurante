<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'rol', // 👈 importante para que Laravel lo pueda guardar
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin() {
        return $this->rol === 'admin';
    }

    public function isTecnico() {
        return $this->rol === 'tecnico';
    }

    // 👇 Agrega esto para que funcionen los middleware can:admin, can:cajero, etc.
    public function can($ability, $arguments = [])
    {
        return $this->rol === $ability;
    }
}
