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

    public function marcarComoLeida(Request $request, $id)
    {
        $notificacion = auth()->user()->notifications()->find($id);

        if ($notificacion) {
            $notificacion->markAsRead();
        }

        return redirect($request->input('redirect_to', route('notificaciones.index')));
    }
}