<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
    use HasFactory;

    protected $table = 'organizacion';

    protected $fillable = [
        'cif',
        'nombre',
        'descripcion',
        'web',
        'imagen',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'organizacion_user')
                    ->withPivot('role')
                    ->withTimestamps();
    }

    // Obtener solo los colaboradores
    public function colaboradores()
    {
        return $this->users()->wherePivot('role', 'colaborador');
    }

    // Obtener solo los administradores
    public function administradores()
    {
        return $this->users()->wherePivot('role', 'admin');
    }
}
