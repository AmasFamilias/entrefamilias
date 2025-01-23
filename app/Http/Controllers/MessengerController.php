<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mensaje;
use App\Models\Vacante;
use App\Models\Candidato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessengerController extends Controller
{
    public function showConversations()
    {
        // Obtener todas las vacantes del usuario autenticado
        $vacantes = Vacante::where('user_id', auth()->user()->id)->get();

        // Crear una colección vacía para los receptores contactados
        $receptoresContactados = collect();
    
        // Iterar a través de las vacantes y obtener los usuarios receptores únicos de los mensajes
        foreach ($vacantes as $vacante) {
            $mensajes = $vacante->mensajes;
            foreach ($mensajes as $mensaje) {
                // Solo agregar receptores únicos
                if (!$receptoresContactados->contains($mensaje->receiver)) {
                    $receptoresContactados->push($mensaje->receiver);
                }
            }
        }
        
        // Retornar la vista con los receptores contactados agrupados
        return view('conversaciones.index', compact('receptoresContactados'));
    }
    
    public function index($vacante, $user_id)
    {
        return view('mensajes.index', [
            'vacante_id' => $vacante,
            'user_id' => $user_id,
        ]);
    }

    public function show($mensaje_id)
    {
        // Buscar el mensaje por su ID
        $mensaje = Mensaje::findOrFail($mensaje_id);
    
        // Validar que el usuario tiene permisos para ver el mensaje
        if (auth()->id() !== $mensaje->sender_id && auth()->id() !== $mensaje->receiver_id) {
            abort(403, 'No tienes permiso para ver este mensaje');
        }
    
        // Obtener información de la vacante asociada
        $vacante = Vacante::find($mensaje->vacante_id);
    
        // Obtener el usuario remitente y receptor
        $sender = User::find($mensaje->sender_id);
        $receiver = User::find($mensaje->receiver_id);
    
        // Devolver la vista con el mensaje y la información adicional
        return view('mensajes.show', compact('mensaje', 'vacante', 'sender', 'receiver'));
    }
    
}
