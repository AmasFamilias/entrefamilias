<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    public function __invoke()
    { 
        $usuario = auth()->user();

        $notificacionesNoLeidas = $usuario->unreadNotifications->filter(function ($n) {
            return isset($n->data['tipo']);
        });
    
        $notificacionesLeidas = $usuario->readNotifications()->get()->filter(function ($n) {
            return isset($n->data['tipo']);
        })->values(); // opcional: puedes aplicar paginación manual si lo deseas
    
        return view('notificaciones.index', [
            'notificacionesNoLeidas' => $notificacionesNoLeidas,
            'notificacionesLeidas' => $notificacionesLeidas,
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