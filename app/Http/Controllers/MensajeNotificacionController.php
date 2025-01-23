<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MensajeNotificacionController extends Controller
{
    public function __invoke(Request $request)
    {
        $notificaciones = auth()->user()->unreadNotifications->where('type', 'App\Notifications\NuevoMensaje');

        // Limpiar notificaciones después de ser vistas
        auth()->user()->unreadNotifications->where('type', 'App\Notifications\NuevoMensaje')->markAsRead();

        return view('notificaciones.mensajes', [
            'notificaciones' => $notificaciones
        ]);
    }
}
