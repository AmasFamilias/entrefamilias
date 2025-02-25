<?php

namespace App\Livewire;

use Livewire\Component;

class MostrarVacante extends Component
{
    public $vacante;
    public $etiquetas = [];

    public function mount($vacante)
    {
        $this->vacante = $vacante;
        $this->etiquetas = is_array($vacante->etiquetas) ? $vacante->etiquetas : json_decode($vacante->etiquetas, true) ?? [];
    }

    public function render()
    {
        return view('livewire.mostrar-vacante');
    }
}