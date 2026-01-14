<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Vacante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Vacante $vacante)
    {
        // Verificar que el usuario autenticado es el propietario de la vacante
        if (!Gate::allows('update', $vacante)) {
            abort(403, 'No tienes permiso para ver los candidatos de esta vacante.');
        }

        return view('candidatos.index', [
            'vacante' => $vacante
        ]);
    }

}
