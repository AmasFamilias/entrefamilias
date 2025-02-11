<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class MenuHabilidades extends Component
{
    public $tieneHabilidades;

    protected $listeners = ['habilidadesActualizadas' => 'actualizarEstado'];

    public function mount()
    {
        $this->actualizarEstado();
    }

    public function actualizarEstado()
    {
        $this->tieneHabilidades = Auth::user()->habilidades()->exists();
    }
    
    public function render()
    {
        return view('livewire.menu-habilidades');
    }
}
