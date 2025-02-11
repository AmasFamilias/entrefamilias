<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Habilidad;
use Illuminate\Support\Facades\Auth;

class Habilidades extends Component
{
    public $selectedHabilidades = [];
    public $errorSeleccion = false;
    public $showSuccessModal = false; // Definir variable para evitar errores

    public function mount()
    {
        $this->selectedHabilidades = Auth::user()->habilidades->pluck('id')->toArray();
    }

    public function toggleHabilidad($habilidadId)
    {
        if (in_array($habilidadId, $this->selectedHabilidades)) {
            $this->selectedHabilidades = array_diff($this->selectedHabilidades, [$habilidadId]);
            $this->errorSeleccion = false;
        } elseif (count($this->selectedHabilidades) < 2) {
            $this->selectedHabilidades[] = $habilidadId;
            $this->errorSeleccion = false;
        } else {
            $this->errorSeleccion = true;
        }
    }

    public function actualizarHabilidades()
    {
        Auth::user()->habilidades()->sync($this->selectedHabilidades);
        $this->showSuccessModal = true; // Mostrar modal de éxito
        $this->dispatch('habilidadesActualizadas');
    }

    public function cerrarModal()
    {
        $this->showSuccessModal = false;
    }

    public function getTieneHabilidadesProperty()
    {
        return Auth::user()->habilidades()->exists();
    }

    public function render()
    {
        $habilidades = Habilidad::all();
        return view('livewire.habilidades', [
            'habilidades' => $habilidades
        ]);
    }
}
