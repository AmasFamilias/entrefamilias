<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class MenuPrincipios extends Component
{
    public $tienePrincipios;

    protected $listeners = ['principiosActualizados' => 'actualizarEstado'];

    public function mount()
    {
        $this->actualizarEstado();
    }

    public function actualizarEstado()
    {
        $this->tienePrincipios = Auth::user()->principios()->exists();
    }
    
    public function render()
    {
        return view('livewire.menu-principios');
    }
}
