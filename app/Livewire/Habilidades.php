<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Habilidad;
use Illuminate\Support\Facades\Auth;

class Habilidades extends Component
{
    public $selectedHabilidades = [];  // Arreglo para almacenar las habilidades seleccionadas

    public function mount()
    {
        // Al iniciar el componente, cargamos las habilidades seleccionadas por el usuario
        $this->selectedHabilidades = Auth::user()->habilidades->pluck('id')->toArray();
    }           

    public function updatedSelectedHabilidades()
    {
        // Verificar si el usuario selecciona más de 2 habilidades
        if (count($this->selectedHabilidades) > 2) {
            array_pop($this->selectedHabilidades); // Quitar la habilidad seleccionada en exceso
        }
    }

    public function actualizarHabilidades()
    {
        // Sincronizar las habilidades seleccionadas con la tabla pivote
        Auth::user()->habilidades()->sync($this->selectedHabilidades);

        // Disparar evento para mostrar una alerta de éxito
        $this->dispatch('habilidadesActualizadas'); 
    }

    public function render()
    {
        $habilidades = Habilidad::all();

        return view('livewire.habilidades',[
            'habilidades' => $habilidades
        ]);
    }
}