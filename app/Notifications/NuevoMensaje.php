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
        // Generar URLs absolutas para las imágenes usando las rutas públicas seguras
        // En emails necesitamos URLs absolutas completas para que las imágenes se muestren
        // route() por defecto genera URLs absolutas si APP_URL está configurado
        $appUrl = rtrim(config('app.url'), '/');
        
        $imagenVacanteUrl = null;
        if (!empty($this->vacante->imagen) && !empty(trim($this->vacante->imagen))) {
            // Generar URL absoluta directamente usando route() (genera absoluta por defecto)
            $imagenVacanteUrl = route('file.vacante', [
                'vacanteId' => $this->vacante->id,
                'filename' => basename($this->vacante->imagen)
            ], true); // true = URL absoluta
        } else {
            // URL absoluta para imagen por defecto
            $imagenVacanteUrl = $appUrl . '/images/default-vacante.png';
        }

        $fotoRemitenteUrl = null;
        if (!empty($this->sender->profile_image) && !empty(trim($this->sender->profile_image))) {
            // Generar URL absoluta directamente usando route() (genera absoluta por defecto)
            $fotoRemitenteUrl = route('file.profile', [
                'userId' => $this->sender->id,
                'filename' => basename($this->sender->profile_image)
            ], true); // true = URL absoluta
        } else {
            // URL absoluta para imagen por defecto
            $fotoRemitenteUrl = $appUrl . '/images/datospersonales.png';
        }

        return (new MailMessage)
            ->subject('📩 Nuevo Mensaje en tu Anuncio')
            ->markdown('emails.nuevo_mensaje', [
                'nombre_vacante' => $this->vacante->titulo,
                'imagen_vacante_url' => $imagenVacanteUrl,
                'nombre_remitente' => $this->sender->name,
                'foto_remitente_url' => $fotoRemitenteUrl,
                'mensaje' => $this->mensaje->message,
                'url' => url('/notificaciones-mensajes')
            ]);
    }

    public function toDatabase($notifiable)
    { 
        return [
            'tipo' => 'mensaje',
            'id_vacante' => $this->vacante->id,
            'nombre_vacante' => $this->vacante->titulo,
            'mensaje' => $this->mensaje->message,
            'sender_id' => $this->sender->id,
            'receiver_id' => $this->receiver->id,
            'sender_name' => $this->sender->name,
            'imagen_vacante' => $this->vacante->imagen,
        ];
    }

}
