<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Principio;
use Illuminate\Support\Facades\Auth;

class Principios extends Component
{
    public $selectedPrincipios = [];
    public $errorSeleccion = false;
    public $showSuccessModal = false;

    public function mount()
    {
        $this->selectedPrincipios = Auth::user()->principios->pluck('id')->toArray();
    }

    public function togglePrincipio($principioId)
    {
        if (in_array($principioId, $this->selectedPrincipios)) {
            $this->selectedPrincipios = array_diff($this->selectedPrincipios, [$principioId]);
            $this->errorSeleccion = false;
        } elseif (count($this->selectedPrincipios) < 5) {
            $this->selectedPrincipios[] = $principioId;
            $this->errorSeleccion = false;
        } else {
            $this->errorSeleccion = true;
        }
    }

    public function actualizarPrincipios()
    {
        Auth::user()->principios()->sync($this->selectedPrincipios);
        $this->showSuccessModal = true;
        $this->dispatch('principiosActualizados');
    }

    public function cerrarModal()
    {
        $this->showSuccessModal = false;
    }

    public function render()
    {
        $principios = Principio::orderBy('descripcion')->get();
        return view('livewire.principios', [
            'principios' => $principios
        ]);
    }
}
