<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MensajeNotificacionController extends Controller
{
    public function __invoke(Request $request)
    { 
        $usuario = auth()->user();

        return view('notificaciones.mensajes', [
            'notificacionesNoLeidas' => $usuario->unreadNotifications->where('type', 'App\Notifications\NuevoMensaje'),
            'notificacionesLeidas' => $usuario->notifications()
                ->where('type', 'App\Notifications\NuevoMensaje')
                ->whereNotNull('read_at') 
                ->paginate(10) // Paginación de 10
        ]);
    }

    public function marcarComoLeida($notificationId)
    {
        $user = auth()->user();
        $notificacion = $user->notifications()->find($notificationId);

        if (!$notificacion) {
            abort(404, 'La notificación no existe.');
        }

        // Validar que la notificación pertenece al usuario autenticado
        if ($notificacion->notifiable_id !== $user->id) {
            abort(403, 'No tienes permiso para acceder a esta notificación.');
        }

            $notificacion->markAsRead(); 
            return redirect()->route('mensajes.index', [
                $notificacion->data['id_vacante'],
                $notificacion->data['sender_id']
            ]);
    }
}
