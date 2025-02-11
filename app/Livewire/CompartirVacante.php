<?php

namespace App\Livewire;

use Livewire\Component;

class CompartirVacante extends Component
{
    public $vacante;

    public function compartir()
    {
        $url = request()->fullUrl();
        $mensaje = "¡Mira esta oportunidad en $url!";

        // Emite un evento para Livewire
        $this->dispatch('copiarTexto', $mensaje);
    }

    public function render()
    {
        return view('livewire.compartir-vacante');
    }
}
