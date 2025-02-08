<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAnuncio extends Model
{
    use HasFactory;

    protected $table = 'tipo_anuncio';

    protected $fillable = ['descripcion'];

    public function vacantes()
    {
        return $this->hasMany(Vacante::class, 'tipoanuncio_id');
    }

}
