<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
 
class InvitarColaborador extends Notification
{
    use Queueable;

    public $organizacion;
    public $admin;

    /**
     * Create a new notification instance.
     */
    public function __construct($organizacion, $admin)
    {
        $this->organizacion = $organizacion;
        $this->admin = $admin;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("📢 {$this->admin->name} te ha invitado a unirte a {$this->organizacion->nombre} en EntreFamilias")
            ->markdown('emails.invitar_colaborador', [
                'organizacion' => $this->organizacion,
                'usuario' => $this->admin,
            ]);
    }

    /**
     * Get the array representation of the notification for database storage.
     */
    public function toDatabase($notifiable)
    {
        return [
            'tipo' => 'invitacion',
            'organizacion_id' => $this->organizacion->id,
            'organizacion_nombre' => $this->organizacion->nombre,
            'admin_nombre' => $this->admin->name,
        ];
    }

}
