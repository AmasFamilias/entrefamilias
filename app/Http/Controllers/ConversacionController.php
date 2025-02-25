<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use App\Models\Mensaje;
use Illuminate\Http\Request;

class ConversacionController extends Controller
{
    public function index()
    {
        $usuario = auth()->user();

        $vacantes = Vacante::whereHas('mensajes', function($query) use ($usuario) {
            $query->where('sender_id', $usuario->id)
                ->orWhere('receiver_id', $usuario->id);
        })->with(['mensajes.sender', 'mensajes.receiver'])->get();

        return view('conversaciones.index', compact('vacantes', 'usuario'));
    }
}
