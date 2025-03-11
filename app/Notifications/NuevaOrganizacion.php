<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevaOrganizacion extends Notification
{
    use Queueable;

    protected $organizacion;
    protected $usuario;

    public function __construct($organizacion, $usuario)
    {
        $this->organizacion = $organizacion;
        $this->usuario = $usuario;
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        // Si la organización no tiene imagen, usar la imagen por defecto
        $imagen = $this->organizacion->imagen 
            ? asset('storage/' . $this->organizacion->imagen) 
            : asset('images/perfil_ong.png');

        return (new MailMessage)
            ->subject('🎉 Nueva Organización Creada')
            ->markdown('emails.nueva_organizacion', [
                'nombre' => $this->organizacion->nombre,
                'descripcion' => $this->organizacion->descripcion,
                'imagen' => $imagen,  
                'usuario_nombre' => $this->usuario->name,
                'usuario_email' => $this->usuario->email,
            ]);
    }

    public function toDatabase(object $notifiable)
    {
        return [
            'nombre' => $this->organizacion->nombre,
            'descripcion' => $this->organizacion->descripcion,
            'imagen' => $this->organizacion->imagen ?? 'perfil_ong.png',
            'usuario_nombre' => $this->usuario->name,
            'usuario_email' => $this->usuario->email,
        ];
    }
}
