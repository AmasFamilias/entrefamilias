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
        return (new MailMessage)
        ->subject('📢 Nuevo Contacto en tu Anuncio')
        ->markdown('emails.nuevo_candidato', [
            'nombre_vacante' => $this->nombre_vacante,
            'imagen_vacante' => $this->imagen_vacante
        ]);
    }

    /**
     * Get the array representation of the notification.S
     *
     * @return array<string, mixed>
     */
    
     //Almacena las notificaciones en la DB
    public function toDatabase( $notifiable)
    {
        return [
            'id_vacante' => $this->id_vacante,
            'nombre_vacante' => $this->nombre_vacante,
            'usuario_id' => $this->usuario_id,
            'imagen_vacante' => $this->imagen_vacante,
       ];
    } 
}
