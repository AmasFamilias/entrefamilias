<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use App\Models\Mensaje;
use Illuminate\Http\Request;

class ConversacionController extends Controller
{
    public function index()
    {
        // Obtener las vacantes con las que el usuario ha interactuado
        $vacantes = Vacante::whereHas('mensajes', function($query) {
            $query->where('sender_id', auth()->id())
                  ->orWhere('receiver_id', auth()->id());
        })->with('mensajes')->get();

        return view('conversaciones.index', compact('vacantes'));
    }
}
