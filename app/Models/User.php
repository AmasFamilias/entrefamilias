<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
        'direccion',
        'movil',
        'profile_image',
        'nameuser',
        'sobremi',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function habilidades()
    {
        return $this->belongsToMany(Habilidad::class, 'habilidad_user')->withTimestamps();
    }

    public function talentos()
    {
        return $this->belongsToMany(Talento::class, 'talento_user')->withTimestamps();
    }

    public function principios()
    {
        return $this->belongsToMany(Principio::class, 'principio_user')->withTimestamps();
    }

    public function organizaciones()
    {
        return $this->belongsToMany(Organizacion::class, 'organizacion_user')->withTimestamps();
    }
 
    public function getProfilePhotoUrlAttribute()
    {
        $path = "profiles/" . $this->profile_image; // Añadir la carpeta 'profiles/'
    
        if (!empty($this->profile_image) && Storage::disk('public')->exists($path)) {
            return asset("storage/" . $path); // Devuelve la URL correcta
        }
    
        return asset('images/datospersonales.png'); // Imagen por defecto
    }
    
    public function getTipoUsuarioAttribute()
    {
        return $this->attributes['tipo_usuario'] == 1 ? 'Persona' : 'Organización';
    }

    //Opcion utilizada para el Menu o Futuras Funciones
    public function tieneOrganizacion()
    {
        return $this->organizaciones()->exists();
    }

    public function candidatos()
    {
        return $this->hasMany(Candidato::class, 'user_id');
    }

    public function vacantes()
    {
        return $this->hasMany(Vacante::class, 'user_id');
    }

    public function mensajesRecibidos()
    {
        return $this->hasMany(Mensaje::class, 'receiver_id');
    }

    public function mensajesEnviados()
    {
        return $this->hasMany(Mensaje::class, 'sender_id');
    }
}
