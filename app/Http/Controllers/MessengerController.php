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
        // Validar que los parámetros son numéricos
        if (!is_numeric($vacante) || !is_numeric($user_id)) {
            abort(404, 'Recurso no encontrado');
        }
        
        // Validar que la vacante existe
        $vacanteModel = Vacante::findOrFail($vacante);
        
        // Validar que el usuario existe
        $user = User::findOrFail($user_id);
        
        // Verificar que el usuario autenticado está relacionado con la vacante o el mensaje
        $usuarioAutenticado = auth()->id();
        
        // Casos donde el acceso está permitido:
        // 1. El usuario es el propietario de la vacante (puede hablar con cualquier candidato)
        // 2. El usuario es el otro participante en la conversación (user_id)
        // 3. El usuario es candidato de la vacante Y está intentando hablar con el propietario
        // 4. Hay mensajes entre el usuario autenticado y el user_id para esta vacante
        
        $esPropietario = $vacanteModel->user_id === $usuarioAutenticado;
        $esParticipante = (int)$user_id === $usuarioAutenticado;
        $esPropietarioVacante = $vacanteModel->user_id === (int)$user_id;
        
        // Si es el propietario de la vacante, siempre puede acceder
        if ($esPropietario) {
            // El propietario puede hablar con cualquier usuario relacionado con su vacante
            // No necesita validación adicional
        }
        // Si es el participante directo (user_id), puede acceder
        elseif ($esParticipante) {
            // El usuario puede acceder a su propia conversación
        }
        // Si no es propietario ni participante, verificar otras condiciones
        else {
            // Verificar si el usuario es candidato de la vacante
            // Y está intentando hablar con el propietario de la vacante
            $esCandidato = Candidato::where('vacante_id', $vacante)
                ->where('user_id', $usuarioAutenticado)
                ->exists();
            
            // Si es candidato y está intentando hablar con el propietario, permitir acceso
            if ($esCandidato && $esPropietarioVacante) {
                // Permitir acceso: candidato hablando con propietario
            }
            // Si no, verificar si hay mensajes entre estos usuarios
            else {
                $tieneMensajes = Mensaje::where('vacante_id', $vacante)
                    ->where(function($query) use ($usuarioAutenticado, $user_id) {
                        $query->where(function($q) use ($usuarioAutenticado, $user_id) {
                            $q->where('sender_id', $usuarioAutenticado)
                              ->where('receiver_id', $user_id);
                        })->orWhere(function($q) use ($usuarioAutenticado, $user_id) {
                            $q->where('sender_id', $user_id)
                              ->where('receiver_id', $usuarioAutenticado);
                        });
                    })->exists();
                
                // Si no hay mensajes, denegar acceso
                if (!$tieneMensajes) {
                    abort(403, 'No tienes permiso para acceder a esta conversación.');
                }
            }
        }

        return view('mensajes.index', [
            'vacante_id' => $vacante,
            'user_id' => $user_id,
        ]);
    }

    public function show($mensaje_id)
    {
        // Validar que el ID es numérico
        if (!is_numeric($mensaje_id)) {
            abort(404, 'Mensaje no encontrado');
        }
        
        // Buscar el mensaje por su ID
        $mensaje = Mensaje::findOrFail($mensaje_id);
    
        // Validar que el usuario tiene permisos para ver el mensaje
        $usuarioAutenticado = auth()->id();
        if ($usuarioAutenticado !== $mensaje->sender_id && $usuarioAutenticado !== $mensaje->receiver_id) {
            abort(403, 'No tienes permiso para ver este mensaje');
        }
    
        // Obtener información de la vacante asociada
        $vacante = Vacante::findOrFail($mensaje->vacante_id);
    
        // Obtener el usuario remitente y receptor
        $sender = User::findOrFail($mensaje->sender_id);
        $receiver = User::findOrFail($mensaje->receiver_id);
    
        // Devolver la vista con el mensaje y la información adicional
        return view('mensajes.show', compact('mensaje', 'vacante', 'sender', 'receiver'));
    }
    
}
