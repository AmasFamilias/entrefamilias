<?php

namespace App\Livewire;

use App\Models\Talento;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Talentos extends Component
{
    public $selectedTalentos = [];
    public $errorSeleccion = false;
    public $showSuccessModal = false;

    public function mount()
    {
        // Cargar los talentos seleccionados por el usuario
        $this->selectedTalentos = Auth::user()->talentos->pluck('id')->toArray();
    }

    public function toggleTalento($talentoId)
    {
        if (in_array($talentoId, $this->selectedTalentos)) {
            $this->selectedTalentos = array_diff($this->selectedTalentos, [$talentoId]);
            $this->errorSeleccion = false;
        } elseif (count($this->selectedTalentos) < 5) {
            $this->selectedTalentos[] = $talentoId;
            $this->errorSeleccion = false;
        } else {
            $this->errorSeleccion = true;
        }
    }

    public function actualizarTalentos()
    {
        Auth::user()->talentos()->sync($this->selectedTalentos);
        $this->showSuccessModal = true;
        $this->dispatch('talentosActualizados');
    }

    public function cerrarModal()
    {
        $this->showSuccessModal = false;
    }

    public function render()
    {
        $talentos = Talento::orderBy('descripcion')->get();
        return view('livewire.talentos', ['talentos' => $talentos]);
    }
}
