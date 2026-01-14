<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'icono',
        'cabecera',
    ];

    public function vacantes()
    {
        return $this->hasMany(Vacante::class, 'categoria_id');
    }

}
 