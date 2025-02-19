<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    public function __invoke()
    {
        $usuario = auth()->user();

        return view('notificaciones.index', [
            'notificacionesNoLeidas' => $usuario->unreadNotifications,
            'notificacionesLeidas' => $usuario->readNotifications()->paginate(10)
        ]);
    }

    public function marcarComoLeida($id)
    {
        $notificacion = auth()->user()->notifications()->find($id);

        if ($notificacion) {
            $notificacion->markAsRead();
        }

        return redirect()->route('notificaciones.index')->with('success', 'Notificación marcada como leída.');
    }
}