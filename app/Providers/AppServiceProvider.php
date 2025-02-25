<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Notifications\VerificacionCuenta;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        VerifyEmail::toMailUsing(function($notifiable, $url){
            return (new MailMessage)
                ->greeting('¡Hola!')
                ->subject('Verificar Cuenta')
                ->line('Tu cuenta ya está casi lista, solo debes presionar el siguiente enlace:')
                ->action('Confirmar Cuenta', $url)
                ->line('Si no creaste esta cuenta, puedes ignorar este mensaje.')
                ->salutation("Gracias por usar Entrefamilias")
                ->attachData(file_get_contents(public_path('images/entrefamilias.png')), 'entrefamilias.png', [
                    'mime' => 'image/png',
                ]);
        });        
    }
}
