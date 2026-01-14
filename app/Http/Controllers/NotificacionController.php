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
        $user = auth()->user();
        $notificacion = $user->notifications()->find($id);

        if (!$notificacion) {
            abort(404, 'La notificación no existe.');
        }

        // Validar que la notificación pertenece al usuario autenticado
        if ($notificacion->notifiable_id !== $user->id) {
            abort(403, 'No tienes permiso para acceder a esta notificación.');
        }

        $notificacion->markAsRead();

        // Obtener la URL de redirección
        $redirectTo = $request->input('redirect_to', route('notificaciones.index'));
        
        // Validar y normalizar la URL de redirección
        if ($redirectTo && !preg_match('/[<>"\']/', $redirectTo)) {
            // Parsear la URL para extraer solo el path (más seguro)
            $parsedUrl = parse_url($redirectTo);
            $path = $parsedUrl['path'] ?? $redirectTo;
            
            // Si tiene query string, incluirlo
            $query = isset($parsedUrl['query']) ? '?' . $parsedUrl['query'] : '';
            
            // Validar que el path empieza con / (ruta relativa segura)
            if (str_starts_with($path, '/')) {
                // Si es una URL absoluta, verificar que el host sea de la misma aplicación
                if (isset($parsedUrl['host'])) {
                    $appHost = parse_url(config('app.url'), PHP_URL_HOST);
                    $currentHost = request()->getHost();
                    $httpHost = request()->getHttpHost();
                    // Extraer solo el host sin puerto para comparación
                    $httpHostWithoutPort = explode(':', $httpHost)[0];
                    
                    // Lista de hosts permitidos (normalizados sin puerto)
                    $allowedHosts = array_filter([
                        $appHost, 
                        $currentHost, 
                        $httpHostWithoutPort,
                        'localhost', 
                        '127.0.0.1'
                    ]);
                    
                    // Normalizar el host de la URL también (sin puerto)
                    $redirectHost = explode(':', $parsedUrl['host'])[0];
                    
                    if (!in_array($redirectHost, $allowedHosts, true)) {
                        // Host externo no permitido, usar ruta por defecto
                        return redirect()->route('notificaciones.index');
                    }
                }
                
                // Usar solo el path para la redirección (más seguro y evita problemas de dominio)
                return redirect($path . $query);
            } else {
                // Si no empieza con /, no es una ruta válida
                return redirect()->route('notificaciones.index');
            }
        }
        
        // Si hay problemas con la URL, redirigir al índice de notificaciones
        return redirect()->route('notificaciones.index');
    }
}