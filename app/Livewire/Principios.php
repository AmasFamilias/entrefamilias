<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Principio;
use Illuminate\Support\Facades\Auth;

class Principios extends Component
{
    public $selectedPrincipios = [];  // Arreglo para almacenar los Principios seleccionadas

    public function mount()
    {
        // Al iniciar el componente, cargamos los talentos seleccionadas por el usuario
        $this->selectedPrincipios = Auth::user()->principios->pluck('id')->toArray();
    }

    public function updatedSelectedPrincipios()
    {
        // Verificar si el usuario selecciona más de 5 Principios
        if (count($this->selectedPrincipios) > 5) {
            array_pop($this->selectedPrincipios); // Quitar el Principio seleccionado en exceso
        }
    }


    public function actualizarPrincipios()
    {
        // Sincronizar los talentos seleccionadas con la tabla pivote
        Auth::user()->principios()->sync($this->selectedPrincipios);

        // Disparar evento para mostrar una alerta de éxito
        $this->dispatch('principiosActualizados'); 
    }

    public function render()
    {
        $principios = Principio::orderBy('descripcion')->get();

        return view('livewire.principios', [
            'principios' => $principios
        ]);
    }
}