<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VacanteController extends Controller
{
    public function index()
    {
        // $this->authorize('viewAny', Vacante::class);
        
        if (Gate::allows('viewAny', Vacante::class)){
             return view('vacantes.index');
        }
    }

    public function create(Vacante $vacante)
    {
        if (Gate::allows('create', $vacante)){
            return view('vacantes.create', [
                 'vacante' => $vacante
            ]);
        }else{
            return redirect()->route('vacantes.index');
        }
    }

    public function show(Vacante $vacante)
    {
        return view('vacantes.show', [
            'vacante' => $vacante
        ]);
    }
 
    public function edit(Vacante $vacante)
    {   
        if (Gate::allows('update', $vacante)){
            return view('vacantes.edit', [
                'vacante' => $vacante
            ]);
        }else{
            return redirect()->route('vacantes.index');
        }
    }

}
