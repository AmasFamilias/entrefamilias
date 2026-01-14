<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($id_vacante, $nombre_vacante, $usuario_id, $imagen_vacante)
    {
        $this->id_vacante = $id_vacante;
        $this->nombre_vacante = $nombre_vacante;
        $this->usuario_id = $usuario_id;
        $this->imagen_vacante = $imagen_vacante;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        // Generar URL absoluta para la imagen de la vacante usando la ruta pública segura
        // En emails necesitamos URLs absolutas completas para que las imágenes se muestren
        // url() helper siempre genera URLs absolutas basándose en APP_URL
        $imagenVacanteUrl = null;
        if ($this->imagen_vacante) {
            // Generar URL absoluta usando route() con url() para asegurar formato completo
            $imagenVacanteUrl = url(route('file.vacante', [
                'vacanteId' => $this->id_vacante,
                'filename' => basename($this->imagen_vacante)
            ], false));
        } else {
            // URL absoluta para imagen por defecto
            $imagenVacanteUrl = url('/images/default-vacante.png');
        }

        return (new MailMessage)
        ->subject('📢 Nuevo Contacto en tu Anuncio')
        ->markdown('emails.nuevo_candidato', [
            'nombre_vacante' => $this->nombre_vacante,
            'imagen_vacante_url' => $imagenVacanteUrl
        ]);
    }

    /**
     * Get the array representation of the notification.S
     *
     * @return array<string, mixed>
     */
    
     //Almacena las notificaciones en la DB
    public function toDatabase($notifiable)
    {
        return [
            'tipo' => 'candidato',
            'id_vacante' => $this->id_vacante,
            'nombre_vacante' => $this->nombre_vacante,
            'usuario_id' => $this->usuario_id,
            'imagen_vacante' => $this->imagen_vacante,
        ];
    }

}
