<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Mensaje;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NuevoMensaje extends Notification
{
    use Queueable;

    private $vacante;
    private $mensaje;
    private $sender;
    private $receiver;

    public function __construct($vacante, $mensaje, $sender, $receiver)
    {
        $this->vacante = $vacante;
        $this->mensaje = $mensaje;
        $this->sender = $sender;
        $this->receiver = $receiver;
    }

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
            ->subject('📩 Nuevo Mensaje en tu Anuncio')
            ->markdown('emails.nuevo_mensaje', [
                'nombre_vacante' => $this->vacante->titulo,
                'imagen_vacante' => $this->vacante->imagen,
                'nombre_remitente' => $this->sender->name,
                'foto_remitente' => $this->sender->profile_image,
                'mensaje' => $this->mensaje->message,
                'url' => url('/notificaciones-mensajes')
            ]);
    }

    public function toDatabase($notifiable)
    { 
        return [
            'id_vacante' => $this->vacante->id,
            'nombre_vacante' => $this->vacante->titulo,
            'mensaje' => $this->mensaje->message,
            'sender_id' => $this->sender->id,
            'receiver_id' => $this->receiver->id,
            'sender_name' => $this->sender->name
        ];
    }
}
