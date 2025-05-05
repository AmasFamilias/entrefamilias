<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use App\Models\Mensaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConversacionController extends Controller
{
    public function index(Request $request)
    {
        $usuario = auth()->user();
        $busqueda = $request->get('busqueda');
        $orden = $request->get('orden', 'reciente');

        $query = Vacante::whereHas('mensajes', function($query) use ($usuario) {
            $query->where('sender_id', $usuario->id)
                ->orWhere('receiver_id', $usuario->id);
        });

        // Aplicar búsqueda si existe
        if ($busqueda) {
            $query->where(function($q) use ($busqueda) {
                $q->where('titulo', 'like', "%{$busqueda}%")
                  ->orWhereHas('mensajes', function($q) use ($busqueda) {
                      $q->where('message', 'like', "%{$busqueda}%");
                  });
            });
        }

        // Obtener las vacantes con sus mensajes y usuarios relacionados
        $vacantes = $query->with([
            'mensajes' => function($query) use ($usuario) {
                $query->where('sender_id', $usuario->id)
                      ->orWhere('receiver_id', $usuario->id)
                      ->orderBy('created_at', 'desc');
            },
            'mensajes.sender',
            'mensajes.receiver'
        ])->get();

        // Agrupar mensajes por conversación y obtener el último mensaje
        $vacantes->each(function($vacante) use ($usuario) {
            $vacante->conversaciones = $vacante->mensajes->groupBy(function($mensaje) use ($usuario) {
                return $mensaje->sender_id === $usuario->id ? $mensaje->receiver_id : $mensaje->sender_id;
            })->map(function($mensajes) {
                return [
                    'ultimo_mensaje' => $mensajes->first(),
                    'total_mensajes' => $mensajes->count(),
                    'no_leidos' => $mensajes->where('leido', false)->count()
                ];
            });
        });

        // Ordenar las vacantes según el criterio seleccionado
        $vacantes = $vacantes->sortBy(function($vacante) use ($orden) {
            switch ($orden) {
                case 'antiguo':
                    return $vacante->conversaciones->min(function($conversacion) {
                        return $conversacion['ultimo_mensaje']->created_at;
                    });
                case 'titulo':
                    return $vacante->titulo;
                case 'reciente':
                default:
                    return -strtotime($vacante->conversaciones->max(function($conversacion) {
                        return $conversacion['ultimo_mensaje']->created_at;
                    }));
            }
        });

        return view('conversaciones.index', compact('vacantes', 'usuario', 'busqueda', 'orden'));
    }

    public function marcarLeidos($vacanteId, $otroUsuarioId)
    {
        $usuario = auth()->user();
        
        Mensaje::where('vacante_id', $vacanteId)
            ->where('receiver_id', $usuario->id)
            ->where('sender_id', $otroUsuarioId)
            ->where('leido', false)
            ->update(['leido' => true]);

        return back()->with('mensaje', 'Mensajes marcados como leídos');
    }
}
