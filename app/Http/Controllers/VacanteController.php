<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VacanteController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Vacante::class);
        
        return view('vacantes.index');
    }

    public function create()
    {
        $this->authorize('create', Vacante::class);
        
        return view('vacantes.create');
    }

    public function show(Vacante $vacante)
    {
        return view('vacantes.show', [
            'vacante' => $vacante
        ]);
    }
 
    public function edit(Vacante $vacante)
    {   
        $this->authorize('update', $vacante);
        
        return view('vacantes.edit', [
            'vacante' => $vacante
        ]);
    }

}
