<?php

namespace App\Models;

use App\Models\User;
use App\Models\Candidato;
use App\Models\Categoria;
use App\Models\TipoAnuncio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    use HasFactory;

    protected $casts = [
        'ultimo_dia' => 'datetime',
        'fecha_evento' => 'datetime',
        'etiquetas' => 'array',
        'organizacion_id' => 'integer',
    ];

    protected $fillable = [
        'titulo',
        'categoria_id',
        'tipoanuncio_id',     
        'organizacion_id',    
        'entidad',
        'ultimo_dia',
        'descripcion',
        'descrip_larga',      
        'presencial',         
        'virtual',            
        'evento',             
        'fecha_evento',       
        'imagen',           
        'etiquetas',          
        'user_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function tipoAnuncio()
    {
        return $this->belongsTo(TipoAnuncio::class, 'tipoanuncio_id');
    }

    public function candidatos()
    {
        return $this->hasMany(Candidato::class)->orderBy('created_at','DESC');
    }

    public function reclutador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mensajes()
    {
        return $this->hasMany(Mensaje::class, 'vacante_id');
    }

    public function organizacion()
    {
        return $this->belongsTo(Organizacion::class, 'organizacion_id');
    }

}