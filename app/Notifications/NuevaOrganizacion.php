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
        // Generar URL absoluta para la imagen de la organización usando la ruta pública segura
        // En emails necesitamos URLs absolutas completas para que las imágenes se muestren
        // url() helper siempre genera URLs absolutas basándose en APP_URL
        $imagenUrl = null;
        if ($this->organizacion->imagen) {
            // Generar URL absoluta usando route() con url() para asegurar formato completo
            $imagenUrl = url(route('file.organizacion', [
                'organizacionId' => $this->organizacion->id,
                'filename' => basename($this->organizacion->imagen)
            ], false));
        } else {
            // URL absoluta para imagen por defecto
            $imagenUrl = url('/images/perfil_ong.png');
        }

        return (new MailMessage)
            ->subject('🎉 Nueva Organización Creada')
            ->markdown('emails.nueva_organizacion', [
                'nombre' => $this->organizacion->nombre,
                'descripcion' => $this->organizacion->descripcion,
                'imagen_url' => $imagenUrl,  
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
