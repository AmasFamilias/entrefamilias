<?php

namespace App\Models;

use App\Livewire\Talentos;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
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
}
