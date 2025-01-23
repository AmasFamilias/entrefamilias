<?php

namespace App\Livewire;
 
use App\Models\Talento;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Talentos extends Component
{
    public $selectedTalentos = [];  // Arreglo para almacenar los talentos seleccionadas

    public function mount()
    {
        // Al iniciar el componente, cargamos los talentos seleccionadas por el usuario
        $this->selectedTalentos = Auth::user()->talentos->pluck('id')->toArray();
    }

    public function updatedSelectedTalentos()
    {
        // Verificar si el usuario selecciona más de 5 talentos
        if (count($this->selectedTalentos) > 5) {
            array_pop($this->selectedTalentos); // Quitar el talento seleccionado en exceso
        }
    }

    public function actualizarTalentos()
    {
        // Sincronizar los talentos seleccionadas con la tabla pivote
        Auth::user()->talentos()->sync($this->selectedTalentos);

         // Disparar evento para mostrar una alerta de éxito
         $this->dispatch('talentosActualizados'); 

    }

    public function render()
    {
        $talentos = Talento::orderBy('descripcion')->get();

        return view('livewire.talentos', [
            'talentos' => $talentos
        ]);
    }
}

